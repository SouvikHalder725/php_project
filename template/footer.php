            </div>


          </div>
        </div>
      </div>
    </main>

  
      
   

    




   
<script src="../asset/js/jquery-3.6.0.min.js"  type="text/javascript"></script>
<script src="../asset/js/bootstrap.min.js"  type="text/javascript" ></script>
<script type="text/javascript" src="../push_js/bin/push.js"></script>
<script type="text/javascript" src="../push_js/bin/push.min.js"></script>
<script type="text/javascript" src="../push_js/bin/serviceWorker.min.js"></script>



    <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
   
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" 
crossorigin="anonymous"></script>




<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="../asset/js/push.min.js"></script>
<script src="../asset/js/serviceWorker.min.js"></script>


<script type="text/javascript" src="../asset/js/jquery.timepicker.min.js"></script>
<script type="text/javascript" src="../asset/js/jquery.timepicker.js"></script>


      
<script src="../asset/js/bootstrap.min.js"></script>
<script src="../asset/js/bootstrap-timepicker.min.js"></script>


<script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js">  
</script> 



 


<script type="text/javascript">
    
  $('#call_time').timepicker  
  (  
    {  
    timeFormat: 'h:mm p',  
    interval: 10,  
    minTime: '06',  
    maxTime: '11:50pm',  
    defaultTime: '11',  
    startTime: '06:00',  
    dynamic: false,  
    dropdown: true,  
    scrollbar: true  
    }  
  );  

   $('#call_close_time').timepicker  
  (  
    {  
    timeFormat: 'h:mm p',  
    interval: 10,  
    minTime: '06',  
    maxTime: '11:50pm',  
    defaultTime: '11',  
    startTime: '06:00',  
    dynamic: false,  
    dropdown: true,  
    scrollbar: true  
    }  
  );  



</script>







 <script type="text/javascript">




   
  


  $(document).ready(function(){



    $("#emp_img").change(function(){
      
          var Data=$('#emp_img').val();
         // var formData= var Data[0];

              //var form = $('#emp_img').val();
             // var formData = new FormData(form);
             //alert(formData);
              //var myForm = document.getElementById('emp_img');
              //var Data = new FormData(myForm);
             console.log(Data);
     
        $.ajax({
            type:'POST',
            url: "upload_image.php",
            data:Data,
            cache:false,
            enctype: 'multipart/form-data',
            contentType: false,
            processData: true,
            success:function(data){
                console.log(data);
            },
            error: function(data){
                console.log("error");
            }
        });
      });







   // for dropdown menu    

      $('#dropdown').click(function(){
        $('#dropdown-menu').slideToggle(); 
          

        });
        
      
  
      $('#close-sidebar').click(function(){
       
       
        
        
        $(".side-item").slideUp();
        $('#leftsidebar').css("width","0px");
        
         
       

      });

      $("#menu-btn").click(function(){
     
         $(".side-item").slideDown();
        $('#leftsidebar').css("width","300px");

      });

 // calculator layout

      $('#btn1').click(function(){
       var val=$('#val_two_hidden').val();
       var newval=val+1;
       
       $('#val_two_hidden').val(newval);
       var value_op=$('#val_op').val();
       if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+1;
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }
      })
      $('#btn2').click(function(){
        var val=$('#val_two_hidden').val();
        newval=val+2;

        
        $('#val_two_hidden').val(newval);
        var value_op=$('#val_op').val();
        if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+2;
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }
      })
      $('#btn3').click(function(){
        var val=$('#val_two_hidden').val();
        newval=val+3;

        
        $('#val_two_hidden').val(newval);
        var value_op=$('#val_op').val();
        if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+3;
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }
      })
      $('#btn4').click(function(){
        var val=$('#val_two_hidden').val();
        newval=val+4;

       
        $('#val_two_hidden').val(newval);
        var value_op=$('#val_op').val();
        if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+4;
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }

      })
      $('#btn5').click(function(){
        var val=$('#val_two_hidden').val();
        newval=val+5;

       
        $('#val_two_hidden').val(newval);
        var value_op=$('#val_op').val();
        if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+5;
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }
      })
      $('#btn6').click(function(){
        var val=$('#val_two_hidden').val();
        newval=val+6;

       
        $('#val_two_hidden').val(newval);
        var value_op=$('#val_op').val();
        if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+6;
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }
      })
      $('#btn7').click(function(){
        var val=$('#val_two_hidden').val();
        newval=val+7;

       
        $('#val_two_hidden').val(newval);
        var value_op=$('#val_op').val();
        if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+7;
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }
      })
      $('#btn8').click(function(){
        var val=$('#val_two_hidden').val();
        newval=val+8;

       
        $('#val_two_hidden').val(newval);
        var value_op=$('#val_op').val();
        if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+8;
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }
      })
      $('#btn9').click(function(){
        var val=$('#val_two_hidden').val();
        newval=val+9;

        
        $('#val_two_hidden').val(newval);
        var value_op=$('#val_op').val();
        if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+9;
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }
      })
      $('#btnzero').click(function(){
        var val=$('#val_two_hidden').val();
        newval=val+0;

       
        $('#val_two_hidden').val(newval);
        var value_op=$('#val_op').val();
        if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+0;
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }
      })
      $('#btndot').click(function(){
        var val=$('#val_two_hidden').val();
        newval=val+'.';

      
        $('#val_two_hidden').val(newval);
        var value_op=$('#val_op').val();
        if(value_op!=""){
           var val=$('#input_calc').val();
           var newval=val+'.';
           $('#input_calc').val(newval);
       }
       else{
          $('#input_calc').val(newval);
       }
      })





      $('#btnp').click(function(){
        

        
        var val_one=$('#val_two_hidden').val();


        var val=$('#input_calc').val();
        var newval=val+"+";
        var plus_op=1;
        //alert('the no is :'+val_one+'');
        // var newval=val_one+"+";
        // $('#input_calc').val(newval);

       

        $('#val_one').val(val_one);
        $('#val_op').val(plus_op);
        $('#input_calc').val(newval);
        $('#val_two_hidden').val("");


      });



      $('#btnm').click(function(){
         var val_one=$('#val_two_hidden').val();
        var val=$('#input_calc').val();
        var newval=val+"-";
        var plus_op=2;
        //alert('the no is :'+val_one+'');
        // var newval=val_one+"+";
        // $('#input_calc').val(newval);

       

        $('#val_one').val(val_one);
        $('#val_op').val(plus_op);
        $('#input_calc').val(newval);
        $('#val_two_hidden').val("");
      });



      $('#btnmul').click(function(){
         var val_one=$('#val_two_hidden').val();
        var val=$('#input_calc').val();
        var newval=val+"*";
        var plus_op=3;
        //alert('the no is :'+val_one+'');
        // var newval=val_one+"+";
        // $('#input_calc').val(newval);

       

        $('#val_one').val(val_one);
        $('#val_op').val(plus_op);
        $('#input_calc').val(newval);
        $('#val_two_hidden').val("");
      });



      $('#btnmod').click(function(){
         var val_one=$('#val_two_hidden').val();
        var val=$('#input_calc').val();
        var newval=val+"/";
        var plus_op=4;
        //alert('the no is :'+val_one+'');
        // var newval=val_one+"+";
        // $('#input_calc').val(newval);

       

        $('#val_one').val(val_one);
        $('#val_op').val(plus_op);
        $('#input_calc').val(newval);
        $('#val_two_hidden').val("");
      });




      $('#btneq').click(function(val_one,plus_op){
        
        var val_one=parseFloat($('#val_one').val());
        var operation=$('#val_op').val();
        var value_two_in=parseFloat($('#val_two_hidden').val());
        $('#val_two').val(value_two_in);

       if(val_one!="" && operation==1){
        

        var result=val_one+value_two_in;
        $('#input_calc').val(result);
        $('#val_two_hidden').val(result);


       }
       if(val_one!="" && operation==2){
        

        var result=val_one-value_two_in;
        $('#input_calc').val(result);
        $('#val_two_hidden').val(result);


       }
       if(val_one!="" && operation==3){
        

        var result=val_one*value_two_in;
        $('#input_calc').val(result);
        $('#val_two_hidden').val(result);


       }
       if(val_one!="" && operation==4){
        

        var result=val_one/value_two_in;
        $('#input_calc').val(result);
        $('#val_two_hidden').val(result);


       }
         




       

         

      });
      $('#btn-clear').click(function(){

         $('#input_calc').val("");
        $('#val_two_hidden').val("");
      })





     // scritp for dependent  dropdown input
     



     $('#user').change(function(){
      var user_id=$('#user').val();


      $.ajax({
        type: "GET",
        url: "fetch_department.php",
        dataType: 'JSON',
        data: {

          user_id:user_id
          
        },
        success: function(response) {
          //console.log(response.result.udept);



          var dept_id=response.result.id;
          var dept_name=response.result.udept;
          //alert("deptid:"+dept_id+"dept name:"+dept_name+"||");
          if(dept_id!=""){

             $('#call_log_dept').html('<option value="'+dept_id+'">'+dept_name+'</option>');
          }
          else{

          }

         
          
        }
     });


    

   
     })
     $('#eng_name').change(function(){
      var eng_id=$('#eng_name').val();


      $.ajax({
        type: "GET",
        url: "fetch_department.php",
        dataType: 'JSON',
        data: {

          eng_id:eng_id
          
        },
        success: function(response) {
          //console.log(response.result);



          var edept_id=response.result.edept_id;
          var edept_name=response.result.e_dept;
          //alert("deptid:"+edept_id+"dept name:"+edept_name+"||");
          if(edept_id!=""){

             $('#call_log_eng_dept').html('<option value="'+edept_id+'">'+edept_name+'</option>');
          }
          else{
            
          }
         
          
        }
     });


    

   
     })
        



    





      
        
 });
</script>




    
  </body>
</html>