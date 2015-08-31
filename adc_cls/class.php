<?php

class storikaze_adc_obj {
  
  // If the following bool is false, then the whole
  // object will behave as though it has no viable
  // scenaria (remaining).
  protected $valid_obj;
  
  // This next bool will get set to true only after
  // the object completes it's setup. The object
  // initialization merely does the minimal initial
  // setup (and NOTHING that can become recursive).
  protected $obj_is_set_up;
  
  // And here is the information on where this object
  // gets it's stuff:
  protected $res_src_file;
  
  // The type-specific array:
  protected $innards;
  // Type-specific invocation method
  protected $vkmeth;
  
  function validity ( )
  {
    return $this->valid_obj;
  }
  
  // Here cometh the function where most of the initialization is done:
  protected function initia ( ) {
    if ( $this->obj_is_set_up ) { return $this->valid_obj; }
    if ( ! ( $this->valid_obj ) ) { return $this->valid_obj; }
    
    $this->innards = array();
    
    $filcont = file_get_contents($this->res_src_file);
    $explana = explode("|",$filcont,2);
    $typofit = $GLOBALS["storikaze_adc_typ"][$explana[0]];
    if ( ! is_object($typofit) ) { $this->valid_obj = false; return; }
    if ( ! is_callable($typofit->initr) ) { $this->valid_obj = false; return; }
    if ( ! is_callable($typofit->invok) ) { $this->valid_obj = false; return; }
    
    $initar = Closure::bind($typofit->initr,$this,$this);
    $this->vkmeth = Closure::bind($typofit->invok,$this,$this);
    call_user_func($initar,$explana[1]);
    
    $this->obj_is_set_up = true;
    return true;
  }
  
  function invok ( $othr ) {
    if ( !($this->initia()) ) { return true; }
    return call_user_func($this->vkmeth,$othr);
  }
  
  
  function storikaze_adc_obj ( $povfile, $dstfile )
  {
    $this->obj_is_set_up = false; // The constructor does *not* do the *full* setup
    $this->valid_obj = false; // Will be changed later if it should be 'true'
    
    if ( strlen($dstfile) < 1.5 )
    {
      return;
    }
    
    $ourdir = dirname($povfile);
    $ourdir = realpath($ourdir);
    if ( ! $ourdir ) { return; }
    
    $destina = $dstfile;
    $dstypie = substr($dstfile,0,1);
    if ( $dstypie != "/" )
    {
      $destina = $ourdir . "/" . $dstfile;
    }
    $destina = realpath($destina);
    if ( ! $destina ) { return; }
    if ( ! is_file($destina) ) { return; }
    
    
    # Okay -- this is as far as must be
    $this->res_src_file = $destina;
    $this->valid_obj = true;
  }
}

?>