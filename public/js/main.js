
/**
 * Created by liyigang on 27/2/18.
 */
//公共ajax 方法
function liAjax(methods , url , data , smsg , ermsg , suHref){
    $.ajax({
        method:methods,
        url:url,
        data:data,
        success:function(msg){
            if(msg.status){
                layer.open({
                    title: '成功'
                    ,icon:1
                    ,content: smsg,
                });
                setTimeout(function(){
                    window.location.href = suHref;
                } , 2000)
            }else{
                layer.open({
                    title: '失败'
                    ,icon:5
                    ,content: 'ermsg',
                    yes:function(index){
                        $('.input-password').val('');
                        layer.close(index);
                    }
                });
            }
        }
    });
}
$(() => {
    $('.head_right').on('mouseover' , () => {
        $('.login-menu').fadeIn();
    }).on('mouseout' , () => {
        window.setTimeout(() => {
            $('.login-menu').hide();
        } , 3000)
    });

    $('.login-menu').on('mouseout' , () => {
        window.setTimeout(() => {
            $('.login-menu').hide();
        } , 3000)
    }).on('mouseover' , () => {
        $('.login-menu').show();
    });

    $('.login-menu').on('click' , () => {
        $.ajax({
            method:'post',
            url:'/users/logout/handler',
            data:{},
            success:function(msg){
                layui.use('layer', function(){
                    var layer = layui.layer;
                    if(msg.status){
                        layer.open({
                            title: '成功'
                            ,icon:1
                            ,content: '登出成功',
                            yes:function(){
                                window.location.href = '/user/login';
                            }
                        });
                    }else{
                        layer.open({
                            title: '失败'
                            ,icon:5
                            ,content: '服务器出错,请检查',
                        });
                    }
                });
            }
        })
    });

    //点击图片 新开一页 打印图片
    $('.print-pic').on('click' , function(){
        window.location.href = '/picture/print?src=' +$(this).attr('src');
    })
});