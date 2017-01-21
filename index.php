<!DOCTYPE html>
<html>
  <head>
    <title>Tip Calculator</title>
    <link type='text/css' rel='stylesheet' href='style.css'/>
</head>
<body>
  <div>
    <div class="app-wrap"> 
      <div>
        <h1 id="title" class="text-center">Tip Calculator</h1>
      </div>
      <form method='post'>
        <?php 
          function get_val($input) {
            $val = '';
            if (isset($_POST[$input])) {
              $val = $_POST[$input];
            }
            return $val;
          }
            function get_Custom_val($input) {
            $val = '';
            if (isset($_POST[$input])) {
              $val = $_POST[$input];
            }
            return $val;
          }
          function check_radio($input) {
              if(isset($_POST['submit'])){
                  if(isset( $_POST[$input])){     
                     return 'checked';
                  }
                  else return false;
              }
          }
          echo "<span>Bill subtotal: $</span><input class='form-control' type='text' pattern='[1-9]\d*' placeholder='Total Bill' name='subtotal' value='".get_val('subtotal')."'>";
        ?>
        <br>
        Tip percentage:
        <br>
        <div class='radio-inline'>
          <?php 
            for($var = 10 ; $var < 21; $var = $var + 5) {
              echo "<label class='radio-inline'>
              <input type='radio' checked='". check_radio('tipPercentage')."' name='tipPercentage' value='".$var."'>".$var."%
              </label><br/>";
            }
           ?> 
        </div>
        <br>
        <label class='radio-inline'>
          <?php echo "<input type='radio' checked='" . check_radio('tipPercentage'). "' name='tipPercentage' value='" . get_Custom_val('customInput') . "'> Custom tip: 
          <input type='text' name='customInput' width='5px' id='customTip' value='". get_Custom_val('customInput'). "'>% "?>
        </label>
        
        <br>
        <br>
        <button type ='submit' name='submit' class='btn btn-success btn-lg nohover'>Calculate bill
        </button>
      </form>
      <br>
      <br>
      <div class="results">
        <?php 
            if ( isset( $_POST['submit'] ) ) {
              if(empty($_POST["tipPercentage"])){
                  $tipErr = "Tip is required";
              }else {
                  $tip = $_POST['tipPercentage'];
                  $subtotal = $_POST['subtotal'];
                  $tipAmount = ($tip * $subtotal)/100;
                  $total = $subtotal+ $tipAmount;
              } 
              if(isset($tip)){
                echo 
                  "<p>
                    <strong>Tip:&nbsp; 
                    $<span id='tip'>".$tipAmount ."</span>
                    </strong>
                  </p>"; 
                echo 
                "<p>
                  <strong>Total:&nbsp; 
                    $<span id='total'>".$total ."</span>
                  </strong>
                </p>";
              }
            }
         ?>
      </div>
    </div>
  </div>
</body>
</html>