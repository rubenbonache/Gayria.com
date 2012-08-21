   $(document).ready(function()
{
    $(".follow").click(function()
    {
        var id=$(this).attr("id");
        var dataString = 'id='+ id;
        
        $.ajax
        ({
            type: "POST",
            url: "<?=base_url()?>friend_add.php",
            data: dataString,
            cache: false,
            success: function(html)
            {   
                $("#follow"+id).hide();
                $("#remove"+id).show();
            }
        });
    });

    $(".remove").click(function()
    {
        var id=$(this).attr("id");
        var dataString = 'id='+ id;
        
        $.ajax
        ({
            type: "POST",
            url: "<?=site_url('friend_remove.php');?>",
            data: dataString,
            cache: false,
            success: function(html)
            {   
                $("#remove"+id).hide();
                $("#follow"+id).show();
            }
        });
    });
});