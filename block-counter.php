<html>

<head>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  <style>
    .container {
      padding-top:75px;
      float:left
    }

    .meter-box-container {
      border-radius: 8px;
      background:#0074bb;
      padding:20px;
      width:650px;
      margin:0 auto;
    }

    .meter-box {
      list-style:none;
      padding:0;
      margin:0;
      color:#f7921e;
      font-size:65px;
      font-weight:900;
      text-align: center;
      border-radius:8px;
      width:100%;
      height:80px;
      vertical-align:middle;
    }

    .meter.seven-blocks {
      float: left;
      height: 100%;
      width:13%;
      background: #fff;
      margin-right: 0.6%;
      margin-left:0.6%;
      border-radius:8px;
    }

    .meter-data {
      display: inline-block;
    }
  </style>
</head>
<body>
  
  <div class="container">
    <div class="meter-box-container">
        <ul class="meter-box">
           <li class="meter seven-blocks meter-sign">$</li>
          <li class="meter seven-blocks meter-data" data-meter-index="5">0</li>
           <li class="meter seven-blocks meter-data" data-meter-index="4">0</li>
           <li class="meter seven-blocks meter-data" data-meter-index="3">0</li>
           <li class="meter seven-blocks meter-data" data-meter-index="2">0</li>
           <li class="meter seven-blocks meter-data" data-meter-index="1">0</li>
           <li class="meter seven-blocks meter-data" data-meter-index="0">0</li>
        </ul>
    </div>
  </div>


  <script>
    var amount = Math.floor((Math.random() * 999999) + 1);

    $('.meter-data').each(function(){
      var $this = $(this);
      var pos = parseInt($this.attr('data-meter-index')) + 1;
      

      $({countNum: $this.text()}).animate({
          countNum: amount
      },
      {
        duration: 1500,
        easing:'linear',
        step: function() {
          var val = Math.floor(this.countNum);
          var digits = val.toString(10).split("").map(function(t){return parseInt(t)}); //array of ints
          console.log(val + " = " + digits);
          var num_digits = digits.length;
          var output = digits[num_digits - pos];
          $this.text(output);
        },
        complete: function() {
          $this.text(output);
        }

      });  
        
    });

  </script>


</body>
</html>


