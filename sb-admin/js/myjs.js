$(document).ready(function(){
    $('.delete').click(function(){
        var result = confirm("Are you sure to delete the customer?");
        if(result)
        {
            var cid=$(this).parent('td').attr('id');
            $.ajax({
                //Link
                url:"delete_customer.php",
                //Method type
                type:"POST",
                //Parameter values
                data:{id:cid},
                //Error Function
                error:function(){
                    alert("Fail to delete");
                },
                //Success Function
                //data=return value
                success:function(data){
                    /*$output=JSON.parse(data);
                    console.log($output.id);
                    console.log($output.name);*/

                    $('#tablebody').html(data);
                }
            });
        }
    });
})  