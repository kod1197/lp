<?php 
require_once "cnf/includes.php";
?>

<head> 
        <title>some testing</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    foreach ($css as $css_file){
        echo $css_file;
    }
    ?>
</head>
<body>
    <div class="container">
<ul class="nav nav-pills nav-stacked col-md-2">
  <li class="active"><a href="#tab_a" data-toggle="pill">Pill A</a></li>
  <li><a href="#tab_b" data-toggle="pill">Pill B</a></li>
  <li><a href="#tab_c" data-toggle="pill">Pill C</a></li>
  <li><a href="#tab_d" data-toggle="pill">Pill D</a></li>
</ul>
<div class="tab-content col-md-10">
        <div class="tab-pane active" id="tab_a">
             <h4>Pane A</h4>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                ac turpis egestas.</p>
        </div>
        <div class="tab-pane" id="tab_b">
             <h4>Pane B</h4>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                ac turpis egestas.</p>
        </div>
        <div class="tab-pane" id="tab_c">
             <h4>Pane C</h4>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                ac turpis egestas.</p>
        </div>
        <div class="tab-pane" id="tab_d">
             <h4>Pane D</h4>
            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
                ac turpis egestas.</p>
        </div>
</div><!-- tab content -->
</div>
<pre>http://tutsme-webdesign.info/bootstrap-3-toggable-tabs-and-pills/</pre>
<?php
foreach ($js as $js_file){
    echo $js_file;
}
?>
</body>