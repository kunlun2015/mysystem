/**
 * backed script
 * @authors Amos
 * @date    2016-05-21 11:19:48
 * @copyright www.weipaidang.net
 */
//正在加载屏幕锁定效果
function loading() {
    var html = '<div id="loading-layer"><div class="loading-block"></div><div class="loading"><div class="loading-inner line-scale"><div></div><div></div><div></div><div></div><div></div></div></div></div>';
    $(document.body).prepend(html);
    return false;
}

//移除loading
function loadingRemove(){
    $('#loading-layer').remove();
    return false;
}

//全局推出登陆
$('.logout').click(function(){
    bootbox.dialog({
        message: "确定要退出登录吗？",
        title: "温馨提示：",
        buttons: {
            success: {
                label: "确定",
                className: "green",
                callback: function(){
                    loading();
                    $.post('http://localhost/personal/mysystem/Sadmin/User/logout.html', {}, function(data){
                        if(data.status == 'success'){ 
                            bootbox.dialog({
                                message: data.msg,
                                title: "温馨提示：",
                                buttons: {
                                    success:{
                                        label: "确定",
                                        className: "green",
                                        callback: function(){
                                            window.location.href = '';
                                        }
                                    }                            
                                }
                            })
                        }
                        loadingRemove();
                    }, 'json')
                }
            },
            cancel: {
                label: "取消",
                className: "red"
            }
        }
    })    
    return false;
})