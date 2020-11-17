<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta
              name = "viewport"
              content = "width = device-width, initial-scale = 1.0, maximum-scale = 1.0, user-scalable = no"
        >
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/css/mdui.min.css"
        />
        <script
            src="https://cdn.jsdelivr.net/npm/mdui@1.0.1/dist/js/mdui.min.js"
        ></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <title>下载</title>
    </head>
    <body class="mdui-drawer-body-left mdui-appbar-with-toolbar mdui-theme-primary-blue" id="body">
        <div class="mdui-drawer" id="drawer">
            <ul class="mdui-list">
                <a href="../H5Editor/index.html">
                    <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-avatar"><img src="./src/kano.jpg" alt="钟健"/></div>
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title">钟健</div>
                            <div class="mdui-list-item-text mdui-list-item-one-line">
                                HTML5编辑器
                            </div>
                        </div>
                    </li>
                </a>
                <a href="../weatherForecast/index.html">
                    <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-avatar"><img src="./src/zbq.jpg" alt="张博清"/></div>
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title">张博清</div>
                            <div class="mdui-list-item-text mdui-list-item-one-line">
                                天气知道
                            </div>
                        </div>
                    </li>
                </a>
                <a href="#">
                    <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-avatar"><img src="./src/ztq.jpg" alt="赵天齐"/></div>
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title">赵天齐</div>
                            <div class="mdui-list-item-text mdui-list-item-one-line">
                                服务器下载
                            </div>
                        </div>
                    </li>
                </a>
                <a href="../快递路径查询/Express_Project/Express_Project.html">
                    <li class="mdui-list-item mdui-ripple">
                        <div class="mdui-list-item-avatar"><img src="./src/syl.jpg" alt="施运礼"/></div>
                        <div class="mdui-list-item-content">
                            <div class="mdui-list-item-title">施运礼</div>
                            <div class="mdui-list-item-text mdui-list-item-one-line">
                                物流轨迹查询
                            </div>
                        </div>
                    </li>
                </a>
            </ul>
        </div>
        <div class="mdui-appbar mdui-appbar-fixed">
            <div class="mdui-toolbar mdui-color-theme">
                <a class="mdui-btn mdui-btn-icon" v-on:click="toggle()" id="menu"><i class="mdui-icon material-icons">menu</i></a>
                <a href="javascript:" class="mdui-typo-title">下载</a>
                <div class="mdui-toolbar-spacer"></div>
                <a href="javascript:location.reload(true);" class="mdui-btn mdui-btn-icon"><i class="mdui-icon material-icons">refresh</i></a>
                <button class="mdui-btn mdui-btn-icon" mdui-menu="{target: '#demo-attr-cascade'}"><i class="mdui-icon material-icons">more_vert</i></button>
                <ul class="mdui-menu mdui-menu-cascade" id="demo-attr-cascade">
                    <li class="mdui-menu-item">
                        <a href="javascript:" class="mdui-ripple">
                            颜色主题
                            <span class="mdui-menu-item-more"></span>
                        </a>
                        <ul class="mdui-menu mdui-menu-cascade" id="colorThemeItems">
                            <li class="mdui-menu-item" v-for="i of item">
                                <a v-on:click="setTheme(i.value)" class="mdui-ripple">
                                    <i class="mdui-menu-item-icon mdui-icon material-icons" v-if="i.now === true">check_circle</i>
                                    <i class="mdui-menu-item-icon mdui-icon material-icons" v-else>radio_button_unchecked</i>
                                    {{ i.name }}
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="mdui-container">
            <div class="mdui-typo-display-1-opacity">
                <?php
                    if($_GET["folder"] != ""){
                        echo $_GET["folder"];
                    }else echo "目录";
                ?>
            </div>
            <div class="mdui-typo">
                <hr/>
            </div>
            <div class="empty"></div>
            <?php
                function returnFileType($suffix){
                    if (strcasecmp($suffix, "webp") == 0 || strcasecmp($suffix, "gif") == 0 || strcasecmp($suffix, "jpg") == 0 || strcasecmp($suffix, "svg") == 0 || strcasecmp($suffix, "png") == 0 || strcasecmp($suffix, "raw") == 0 || strcasecmp($suffix, "ico") == 0){
                        return "image";
                    }elseif (strcasecmp($suffix, "mp3") == 0 || strcasecmp($suffix, "wmv") == 0 || strcasecmp($suffix, "flac") == 0 || strcasecmp($suffix, "aac") == 0){
                        return "music_note";
                    }elseif (strcasecmp($suffix, "mp4") == 0 || strcasecmp($suffix, "avi") == 0 || strcasecmp($suffix, "mov") == 0 || strcasecmp($suffix, "wmv") == 0 || strcasecmp($suffix, "flv") == 0 || strcasecmp($suffix, "mkv") == 0){
                        return "videocam";
                    }elseif (strcasecmp($suffix, "zip") == 0 || strcasecmp($suffix, "7z") == 0 || strcasecmp($suffix, "rar") == 0 || strcasecmp($suffix, "tar") == 0){
                        return "archive";
                    }elseif (strcasecmp($suffix, "txt") == 0 || strcasecmp($suffix, "json") == 0 || strcasecmp($suffix, "xml") == 0 || strcasecmp($suffix, "yml") == 0 || strcasecmp($suffix, "sql") == 0){
                        return "description";
                    }elseif (strcasecmp($suffix, "html") == 0 || strcasecmp($suffix, "php") == 0 || strcasecmp($suffix, "css") == 0 || strcasecmp($suffix, "js") == 0 || strcasecmp($suffix, "jsp") == 0){
                        return "chrome_reader_mode";
                    }elseif (strcasecmp($suffix, "pdf") == 0){
                        return "picture_as_pdf";
                    }elseif (strcasecmp($suffix, "exe") == 0){
                        return "&#xe321";
                    }elseif (strcasecmp($suffix, "pkg") == 0){
                        return "laptop_mac";
                    }elseif (strcasecmp($suffix, "deb") == 0 || strcasecmp($suffix, "rpm") == 0){
                        return "&#xe31f";
                    }else{
                        return "insert_drive_file";
                    }
                }
                function outputFile($dirPath){
                    $url = substr($_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'], 0, -10);
                    $url .= substr($dirPath, 1);
                    if(!is_dir($dirPath)){
                        return;
                    }else{
                        $status = 0;
                        $fileList = array();
                        $dirList = array();
                        $fileData = scandir($dirPath);
                        foreach($fileData as $value){
                            if($value != '.' && $value != '..'){
                                if($value == ".hidden"){
                                    $status = 1;
                                    break;
                                }
                                if($value != "index.php"){
                                    if(is_dir($dirPath.$value)){
                                        $dirList[] = $value;
                                    }else{
                                        $fileList[] = $value;
                                    }
                                }
                            }
                        }
                        if($status == 1){
                            echo "&emsp;&ensp;&ensp;空文件夹";
                            return;
                        }
                        if(empty($fileList) == true && empty($dirList) == true){
                            echo "&emsp;&ensp;&ensp;空文件夹";
                            return;
                        }
                        if(empty($dirList) == false){
                            foreach($dirList as $value){
                                echo "<div class=\"mdui-panel mdui-panel-gapless mdui-shadow-0\" mdui-panel>"."<div class=\"mdui-panel-item mdui-shadow-0\">";
                                echo "<div class=\"mdui-panel-item-header\" style=\"height: 36px;\"><i class=\"mdui-icon material-icons\">folder</i>&ensp;";
                                echo $value;
                                echo "</div>";
                                echo "<div class=\"mdui-panel-item-body\">";
                                outputFile($dirPath.$value."/");
                                echo "</div></div></div>";
                            }
                        }
                        if(empty($fileList) == false){
                            foreach($fileList as $value){
                                echo "<a href=\"".$dirPath.$value."\"><button class=\"mdui-btn mdui-btn-block mdui-color-theme-accent mdui-ripple mdui-text-left\">";
                                echo "&ensp;<i class=\"mdui-icon material-icons\">".returnFileType(pathinfo($value, PATHINFO_EXTENSION))."</i>&ensp;";
                                echo $value;
                                echo "</button></a>";
                            }
                        }
                    }
                }
                $target = $_GET["folder"];
                if($target == ""){
                    $target = ".";
                }
                $target .= "/";
                outputFile($target);
            ?>
        </div>
    </body>
    <script>
        let express_menu = new Vue({
            el: "#menu",
            methods: {
                toggle: function () {
                    let inst = new mdui.Drawer('#drawer');
                    inst.toggle();
                }
            }
        });
        let colorThemeItems = new Vue({
            el: "#colorThemeItems",
            data: {
                item: [
                    {name: "蓝色", value: "mdui-theme-primary-blue", now: true},
                    {name: "红色", value: "mdui-theme-primary-red", now: false},
                    {name: "绿色", value: "mdui-theme-primary-green", now: false},
                    {name: "白色", value: "mdui-theme-primary-white", now: false},
                    {name: "夜间模式", value: "mdui-theme-layout-dark", now: false},
                ],
            },
            methods: {
                setTheme: function (color) {
                    let classes = document.getElementsByTagName("body").body.className.split(" ");
                    for (let i = 0; i < classes.length; i++) {
                        if (classes[i].substr(0, 18) === "mdui-theme-primary" || classes[i].substr(0, 22) === "mdui-theme-layout-dark") {
                            for (let ii of this.item) {
                                if (ii.value === classes[i]) {
                                    ii.now = false;
                                }
                                else if (ii.value === color) {
                                    ii.now = true;
                                }
                            }
                            classes[i] = color;
                            break;
                        }
                    }
                    if (color === "mdui-theme-layout-dark") {
                        document.getElementById('themeCss').href = './css/md-dark.css';
                    }
                    else {
                        document.getElementById('themeCss').href = './css/md-light.css';
                    }
                    document.getElementsByTagName("body").body.className = "";
                    for (let i of classes) {
                        document.getElementsByTagName("body").body.className += i + " ";
                    }
                },
            }
        });
    </script>
</html>