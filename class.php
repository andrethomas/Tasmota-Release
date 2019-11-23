<?php

class ReleaseClass {

  public $prefix = "";
  public $releasecount = 0;
  public $version = "";
  public $releaselist;
  public $releasedate;

  function setversion($name, $ver, $reldate)
  {
    $this->prefix = $name;
    $this->version = $ver;
    $this->releasedate = $reldate;
  }

  function addfile($variant, $language)
  {
    $this->releaselist[$this->releasecount][0] = $this->prefix;
    $this->releaselist[$this->releasecount][1] = $language;
    if ($variant === "") {
      $variant = $this->prefix;
      $this->releaselist[$this->releasecount][0] = $variant;
      $this->releaselist[$this->releasecount][2] = $this->prefix . ".bin";
    } else {
      $this->releaselist[$this->releasecount][0] = $variant;
      $this->releaselist[$this->releasecount][2] = $this->prefix . "-" . $variant . ".bin";
    }
    $this->releasecount++;
  }

}

?>
