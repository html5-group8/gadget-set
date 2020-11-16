
var express = express || {};
express.main = {
    SumitBtn: function () {
        //1.判断快递公司是否正确选择 
        //2.判断快递单号是否填写
        var choice = $(".dropbtn").text();
        console.log(choice);
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
        var expressNumber = $(".order-input").val();
        console.log(expressNumber);
        if(expressNumber == ""){
            alert("你什么都不填让我怎么查！");
        }
        commmon.ajax(
            "GET",
            "http://localhost:5000/api/Query/Immediately?expressNumber=" + expressNumber + "&expressCode=" + companyCode + "&sfNumber="+'1', {},
            function (result) {
                //拿到物流数据
                console.log(result.text);
                alert(result.result);
                var json = eval("("+result.result+")");
                alert(json.LogisticCode);
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
                var l = "l";
                var s = "s";
                var w = "w";
                var j = 2;
                var state = json.State;
                alert(state);
                if(state != "0"){
                    alert(json.Traces[0].AcceptTime);
                    for(var i = json.Traces.length - 1;i >= 0; --i){
                        $("#"+l+j+s).text(json.Traces[i].AcceptTime);
                        $("#"+l+j+w).text(json.Traces[i].AcceptStation);
                        ++j;
                    }
                }
                $("#dest").css("display","none");
                for(var k = json.Traces.length + 1;k <= 16; ++k){
                    if(k > 1){
                    $("#"+l+k+w).css("display","none");
                    $("#"+l+k+s).css("display","none");
                    $("#"+l+k).css("display","none");
                    }
                }
                $("#"+l+1+s).text("暂无轨迹信息");
            }
        )
    }
}

$(function(){
    $("#submit_btn").click(function(){
        express.main.SumitBtn();
    })
})