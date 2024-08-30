
  
      <div style="overflow-y: auto;">
        
        <div id="pinpad">

            <form id="formkeypad"> 
            <table style="height:100%;width:100%;border-spacing:0px;">
               <tr>
                    <td style="font-size:150%; text-align:left; color:blue;">
                    FORM RE-PRINT LABEL
                    </td> 
                    <td style="width:5%;padding: 5px;">
                    <span id="tombol-tutup" onclick="tutup()" title="close" style="font-size: 150%;cursor:pointer; padding:5px;">X</span>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="border-top:1px solid #ccc;padding-top: 10px;">
                        <table style="height:100%;width:100%;border-spacing:5px;font-size: 14px;">
                          <tr>
                            <td style="width:25%">Line No</td>
                            <td style="width:1%">:</td>
                            <td style="text-align:left;padding: 10px"><?=$line_no.' '.$remark;?></td>
                          </tr>
                          <tr>
                            <td style="vertical-align:top">
                                Lifting (min)
                            </td>
                            <td style="vertical-align:top">:</td>
                            <td>
                                <input type="text" id="l1" name="l1" maxlength="4" required></br>
                                <div id="psnerror1"></div>
                                <input type="button" value="1" id="1" class="pinButton calc1"/>
                                <input type="button" value="2" id="2" class="pinButton calc1"/>
                                <input type="button" value="3" id="3" class="pinButton calc1"/><br>
                                <input type="button" value="4" id="4" class="pinButton calc1"/>
                                <input type="button" value="5" id="5" class="pinButton calc1"/>
                                <input type="button" value="6" id="6" class="pinButton calc1"/><br>
                                <input type="button" value="7" id="7" class="pinButton calc1"/>
                                <input type="button" value="8" id="8" class="pinButton calc1"/>
                                <input type="button" value="9" id="9" class="pinButton calc1"/><br>
                                <input type="button" value="-" class="pinButton enter"/>
                                <input type="button" value="0" id="0 " class="pinButton calc1"/>
                                <input type="button" value="clear" id="clear" class="pinButton clear" onclick="$('#l1').val('')"/>
                            </td>
                          </tr>
                          <tr>
                            <td style="vertical-align:top">
                                Lifting (max)
                            </td>
                            <td style="vertical-align:top">:</td>
                            <td>
                                <input type="text" id="l2" name="l2" maxlength="4" required></br>
                                <div id="psnerror2"></div>
                                <input type="button" value="1" id="1" class="pinButton calc2"/>
                                <input type="button" value="2" id="2" class="pinButton calc2"/>
                                <input type="button" value="3" id="3" class="pinButton calc2"/><br>
                                <input type="button" value="4" id="4" class="pinButton calc2"/>
                                <input type="button" value="5" id="5" class="pinButton calc2"/>
                                <input type="button" value="6" id="6" class="pinButton calc2"/><br>
                                <input type="button" value="7" id="7" class="pinButton calc2"/>
                                <input type="button" value="8" id="8" class="pinButton calc2"/>
                                <input type="button" value="9" id="9" class="pinButton calc2"/><br>
                                <input type="button" value="-"  class="pinButton enter"/>
                                <input type="button" value="0" id="0 " class="pinButton calc2"/>
                                <input type="button" value="clear" id="clear" class="pinButton clear" onclick="$('#l2').val('')" />
                            </td>
                          </tr>
                          <tr>
                            <td colspan="3" style="border-top:1px solid #ccc;padding:5px;text-align:right">
                                <button class="btn btn-default text-green" type="submit">Submit Print</button>
                            </td>
                        </tr>
                        </table>
                    </td>
                </tr>
                </table>
                
                
            </form>
        </div>
       
      </div>
    
<script type="text/javascript">
$(document).ready(function () {
    $("#l1").focus();
    const i1 = $("#l1");
    const i2 = $("#l2");
    //disable input from typing

    $("#l1").keypress(function () {
        return false;
    });
     $("#l2").keypress(function () {
        return false;
    });
    //add password
    $(".calc1").click(function () {
        let v1 = $(this).val();
        field(v1,i1);
    });
    $(".calc2").click(function () {
        let v2 = $(this).val();
        field(v2,i2);
    });
    function field(value,i) {
        i.val(i.val() + value);
    }
    
});
$('#formkeypad').submit(function(e){
    e.preventDefault();
   var l1 = $("#l1").val();
   var l2 = $("#l2").val();
    $("#psnerror1").html("");
    $("#psnerror2").html(""); 
   if(l1!='' && l2!=''){
    $.ajax({
      async: true,
      type: "POST",
      url :"<?=base_url('andonlabel/submitreprint?api='.$this->encrypt->sha1(rand(1000,10000000)));?>",
      cache:false,
      dataType: 'json',
      data: "l1="+l1+"&l2="+l2+"&line_no=<?=$line_no;?>"+"&remark=<?=$remark;?>",
      success: function(data){                           
            if(data.status==true){
                 swal({
                    title: "Nice!",
                    text: "PRINT LIFTING : " + l1 +" to "+l2,
                    type: "success",
                    timer: 2000,
                    showConfirmButton: false
                  });
                 $("<iframe id='printabel'>")    
                    .hide()                     
                    .attr("src", "<?=base_url('andonlabel/reprintlabel?line_no='.$line_no.'&remark='.$remark.'&l1=');?>"+data.l1+'&l2='+data.l2) 
                    .appendTo("body"); 
               
                              
              }else{
                 $("#psnerror1").html("<span style='color:red'>"+data.psn1+"</span>");
                 $("#psnerror2").html("<span style='color:red'>"+data.psn2+"</span>");
              }
             
      }
    });
   }
   
 
});
</script>