<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>注册</title>
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/sgin_up.css">
        <script language="JavaScript" type="text/javascript">
        var user_class=[
            ["国际经济与贸易","会计学","金融学","财务管理","会展经济与管理","国际商务","统计学","信息与计算科学（数理金融方向）","金融工程"],
            ["物流管理","信息管理与信息系统","电子商务","工商管理","市场营销"],
            ["法学","公共事业管理","电子商务及法律"],
            ["汉语言文学","新闻学","广告学","编辑出版学","网络与新媒体"],
            ["英语","商务英语","日语"],
            ["视觉传达设计（含新媒体设计方向）","环境艺术设计","产品设计","动画","建筑学","风景园林"],
            ["生物技术","生物工程","生物制药","环境科学","环境工程","食品科学与工程","食品质量与安全"],
            ["通信工程","电子信息工程","电气工程及其自动化","物联网工程","计算机科学技术","软件工程","机械电子工程"],
            ["大数据与软件工程学院"],["信息与智能学院"],["基础学院"],["国际学院"],["中德设计与传播学院"],["继续教育学院"]
        ];
        function getUserClass(){
         //获得省份下拉框的对象
         var sltProvince=document.form1.user_college;
         //获得城市下拉框的对象
         var sltCity=document.form1.user_class;
         
         //得到对应省份的城市数组
         var provinceCity=user_class[sltProvince.selectedIndex - 1];

        //清空城市下拉框，仅留提示选项
         sltCity.length=1;
 
         //将城市数组中的值填充到城市下拉框中
         for(var i=0;i<provinceCity.length;i++){
             sltCity[i+1]=new Option(provinceCity[i],provinceCity[i]);
        }
     }
     </script>
    </head>
    <body>




      <form action="{{route('users.sginup')}}" method="post"  name="form1">
        {{ csrf_field()}}
        @include('layouts._errors')
        @include('layouts._messages')
        <h1>注 册</h1>
        <fieldset>
          <label for="name">用户名:</label>
          <input type="text" id="name" name="user_name" required>
          
          <label for="mail">邮&nbsp;箱:</label>
          <input type="email" id="email" name="user_email" required>
          
          <label for="password">密&nbsp;码:</label>
          <input type="password" id="password" name="password" required>
          
          <label for="password">确认密码:</label>
          <input type="password" id="password" name="password_confirmation" required>

          <label for="signature">个性签名:</label>
          <input type="signature" id="signature" name="user_signature">

          <label for="address">地&nbsp;址:</label>
          <input type="address" id="address" name="user_address" required>

          <label for="college">学&nbsp;院:</label>
          <select id="job" name="user_college" onChange="getUserClass()">
            <option>---请选择学院---</option>
            <option value="商学院">商学院</option>
            <option value="物流与电子商务学院">物流与电子商务学院</option>
            <option value="法学院">法学院</option>
            <option value="文化与传播学院">文化与传播学院</option>
            <option value="外语学院">外语学院</option>
            <option value="设计艺术与建筑学院">设计艺术与建筑学院</option>
            <option value="生物与环境学院">生物与环境学院</option>
            <option value="电子与计算机学院">电子与计算机学院</option>

            <option value="大数据与软件工程学院">大数据与软件工程学院</option>
            <option value="信息与智能学院">信息与智能学院</option>
            <option value="基础学院">基础学院</option>
            <option value="国际学院">国际学院</option>
            <option value="中德设计与传播学院">中德设计与传播学院</option>
            <option value="继续教育学院">继续教育学院</option>
        </select>

          <label for="class">专&nbsp;业:</label>
          <select id="job" name="user_class">
            <option>---请选择专业---</option>
          </select>

          <label for="year">年&nbsp;级:</label>
          <select id="job" name="user_year">
            <option>---入学时间---</option>
            <option value="15级">2015</option>
            <option value="16级">2016</option>
            <option value="17级">2017</option>
            <option value="18级">2018</option>
          </select>
          <label>性 别:</label>
          <input type="radio" id="under_13" value="1" name="user_sex" checked ><label for="under_13" class="light">男</label>
          <input type="radio" id="over_13" value="0" name="user_sex"><label for="over_13" class="light">女</label>
        </fieldset>
        <button type="submit">注&nbsp;册</button>
      </form>
      
    </body>
</html>