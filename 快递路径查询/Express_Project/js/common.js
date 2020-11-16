var commmon = {
    ajax: function (type, url, parm, callback, errCallback) {
        if (!type || type === '') type = "GET";
        $.ajax({
            type: type,
            url: url,
            data: AudioParam,
            contentType: "application/json; charset=utf-8",
            datatype: "json",
            success: function (data) {
                if (typeof callback === "function") {
                    callback(data);
                }
            },
            error: function (e) {
                if (typeof errCallback === "function") {
                    errCallback(e);
                } else {
                    alert('网络错误，请刷新重试');
                }
            }
        })
        // $.ajax方法是JQuery的底层实现，返回其创建的XMLHttpRequest对象
    }
}