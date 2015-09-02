            //public var num = 0;
            function show(obj){
                obj.src="__APP__/Home/Common/verify/random/"+Math.random();
            }



            function cheakuser(obj){
                var username = obj.value;
                $("#userdiv").load("__URL__/verifyuser",{"user":username},function(response){
                  //alert(response);
                  if (response == 2) {
                    alert(document.getElementById("userdiv").value.size() );
                    showpng("userdiv");

                    //document.getElementById("submit").disabled = false;
                    //alert(document.getElementById("submit").disabled);
                    //document.getElementById("userdiv").innerHTML = "<img src='/order/public/Images/admin/icons/tick_circle.png' alt='' style='margin:4px 290px 0px 0px;'>";
                  }else{
                    showtxt("userdiv","用户名存在");
                    //document.getElementById("submit").disabled = "disabled";
                    //document.getElementById("userdiv").innerHTML = "<label style='margin:2px 230px 0px 0px;'><font color='red'>用户名存在！</font></label>";
                  }

                });

            }
            function cheakpw(obj){
                var password = obj.value;
                showpng("pw1div");

                //$("#pw1div").load("__URL__/verifypw",{"password":password});
            }
            function samepw(obj){
                var password1 = document.getElementById("pw1").value;
                var password2 = obj.value;
                if(password1 == password2){
                  showpng("pw2div");

                  //document.getElementById("pw2div").innerHTML="<img src='/order/public/Images/admin/icons/tick_circle.png' style='margin:4px 290px 0px 0px'>";
                }
                else{
                  showtxt("pw2div","密码不一致");
                  //document.getElementById("pw2div").innerHTML="<label style='margin:4px 240px 0px 0px'><font color='red'>密码不一致</font></label>";
                  //document.getElementById('submit').disabled = "disabled";
                }
            }
            function checkver(obj){
                var ver = obj.value;++
                $("#verifydiv").load("__URL__/addcheckverify",{"ver":ver},function(response){
                  if(response == 1){
                    showpng("verifydiv");

                  }else{
                    showtxt("verifydiv","验证码错误");
                    //document.getElementById("pw2div").innerHTML="<label style='margin:4px 240px 0px 0px'><font color='red'>密码不一致</font></label>";
                  }
                });
            }


            //显示正确图片
            function showpng(id){
              document.getElementById(id).innerHTML = "<img src='/order/public/Images/admin/icons/tick_circle.png' alt='' style='margin:4px 290px 0px 0px;'>";
            }
            //显示错误的文字
            function showtxt(id,txt){
              document.getElementById(id).innerHTML="<label style='margin:4px 240px 0px 0px'><font color='red'>"+txt+"</font></label>";
            }
            //判断submit的disable属性
            function isdisable(){
              if(document.getElementById("submit").disabled == true){

              }else{
                document.getElementById("submit").disabled = false;
              }
            }