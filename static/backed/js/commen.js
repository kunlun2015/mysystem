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
