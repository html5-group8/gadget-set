var express = express || {};
express.main = {
    SumitBtn: function () {
        //1.判断快递公司是否正确选择 
        //2.判断快递单号是否填写
        var choice = $(".mdui-select-selected").text();
        var companyCode = " ";
        var pre_content1 = "快递单号：";
        var pre_content2 = " 运输商：";
        switch(choice){
            case "圆通速递":
                companyCode = "YTO";
                break;
            case "百世快递":
                companyCode = "HTKY";
                break;
            case "申通快递":
                companyCode = "STO";
                break;
            case "天天快递":
                companyCode = "HHTT"; 
                break;
            default:
                alert("输入错误！");
                break;
        }
        var expressNumber = $(".mdui-textfield-input").val();
        if(expressNumber === ""){
            alert("你什么都不填让我怎么查！");
            return;
        }
        commmon.ajax(
            "GET",
            "http://localhost:5000/api/Query/Immediately?expressNumber=" + expressNumber + "&expressCode=" + companyCode + "&sfNumber="+'1', {},
            function (result) {
                //拿到物流数据
                console.log(result.text);
                // alert(result.result);
                var json = eval("("+result.result+")");
                // alert(json.LogisticCode);
                var company = " ";
                switch(companyCode){
                    case "YTO":
                        company = "圆通速递";
                        break;
                    case "HTKY":
                        company = "百世快递";
                        break;
                    case "STO":
                        company = "申通快递";
                        break;
                    case "HHTT":
                        company = "天天快递"; 
                        break;
                    default:
                        break;
                }
                $("#l1s").text(pre_content1 + json.LogisticCode + pre_content2 + company);
                var state = json.State;
                // alert(state);
                if(state !== "0"){
                    // alert(json.Traces[0].AcceptTime);
                    document.getElementById("timeline").innerHTML = "";
                    for(var i = json.Traces.length - 1;i >= 0; --i){
                        document.getElementById("timeline").innerHTML += "<li class=\"mdui-list-item mdui-ripple\"><i class=\"mdui-list-item-icon mdui-icon material-icons\">access_time</i>" + json.Traces[i].AcceptTime;
                        document.getElementById("timeline").innerHTML += "&emsp;<i class=\"mdui-list-item-icon mdui-icon material-icons\">assignment</i>" + json.Traces[i].AcceptStation + " </li>";
                    }
                }
                else document.getElementById("timeline").innerHTML = "<li class=\"mdui-list-item mdui-ripple\"><i class=\"mdui-list-item-icon mdui-icon material-icons\">block</i>暂时没有物流消息</li>";
            }
        )
    }
}

$(function(){
    $("#submit_btn").click(function(){
        express.main.SumitBtn();
    })
})