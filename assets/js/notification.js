const title=document.createElement('title');
title.innerText="HUMG.DRL.NCKH";
const linkHeader=document.createElement('link');
linkHeader.rel='stylesheet';
linkHeader.href='https://fonts.googleapis.com/css?family=Sofia';
document.head.appendChild(linkHeader);
document.head.innerHTML+='<link rel="shortcut icon" href="https://dkxt.humg.edu.vn/favicon.ico" type="image/x-icon">';
document.head.innerHTML+='<link rel="stylesheet" href="notification.css"> ';
document.head.appendChild(title);
document.body.style='background-image:url(https://wallpaperaccess.com/full/1684484.jpg);'
    +'background-size:100% ;background-repeat:no-repeat;height:100%;';
const header=document.createElement('div');
header.className='top';
(function title(){
    const titleNotification=document.createElement('h1');
    titleNotification.innerHTML+='<p style="font-size:55px;">Trang chấm điểm rèn luyện</p>'
        +'<p style="margin-top:-55px;font-size:40px;">HUMG</p>';
    // titleNotification.innerHTML+='';
    titleNotification.title='Trang chấm điểm rèn luyện HUMG';
    titleNotification.className='title';
    titleNotification.style='text-align:center;font-family: "Sofia", sans-serif;font-weight:1;'
        +'color:#2d8ece;text-shadow:3px 3px 3px aqua ';
    header.appendChild(titleNotification);
}());
document.body.appendChild(header);
//contaiter-mid
const contaiter=document.createElement('div');
document.body.appendChild(contaiter);
//content-top
const contaiterTop=document.createElement('div');
contaiterTop.style='display:flex;justify-content:space-evenly;align-items:center;';
contaiter.appendChild(contaiterTop);
function contaiter_top() {
    const myTimeout = setTimeout(left_top, 2000);
    function left_top(){
        const leftAll=document.createElement('div');
        leftAll.style.animation='left_top 10s ease-in-out 5s 1 normal;';
        contaiterTop.appendChild(leftAll);
        const left=document.createElement('fieldset');
        left.className='left';
        left.style='background-color: #48aaf9;border-radius:20px;border:1px #48aaf9 solid ;width:400px;height:200px;'
        leftAll.appendChild(left);
        const titleText=document.createElement('legend');
        titleText.style='text-align:center;';
        left.appendChild(titleText);
        const borderTitle=document.createElement('div');
        borderTitle.innerText='Giới Thiệu ';
        borderTitle.style='background-color:#2d8ece;border-radius:25px;width:250px;height:45px;font-size:35px;color:white;'
        titleText.appendChild(borderTitle);
        const content=document.createElement('div');
        content.innerHTML+='<p>Chào mừng bạn đến với Website chấm điểm rèn luyện trực tuyến của trường đại học Mỏ-Địa chất ! </p>';
        content.style='font-size:25px;text-align:center;'
        left.appendChild(content);
        clearTimeout(myTimeout);
    };
    
    left_top();
    function right_top(){
        const right=document.createElement('fieldset');
        right.style='background-color: white;border-radius:20px;border:1px white solid ;width:400px;height:200px;';
        contaiterTop.appendChild(right);
        const titleText=document.createElement('legend');
        titleText.style='text-align:center;';
        right.appendChild(titleText);
        const borderTitle=document.createElement('div');
        borderTitle.innerText='Tiêu chí  ';
        borderTitle.style='background-color: #75c4ff;border-radius:25px;width:250px;height:45px;font-size:35px;color:#2d8ece;'
        titleText.appendChild(borderTitle);
        const content=document.createElement('div');
        content.innerHTML+='<p>Website chấm điểm dựa trên tiêu chí :"chấm điểm dựa trên quá trình học tập và tham gia các hoạt động theo từng kỳ của sinh viên ".</p>';
        content.style='font-size:25px;text-align:center;'
        right.appendChild(content);
    };
    right_top();
};
contaiter_top();
//content-mid
const contaiterMid=document.createElement('div');
contaiterMid.style='display:flex;justify-content:space-evenly;align-items:center;margin-top:80px';
contaiter.appendChild(contaiterMid);
function contaiter_mid(){
    const myTime = setTimeout(left_mid, 2000);
    function left_mid(){
        const leftAll=document.createElement('div');
        leftAll.style.animation='left_top 10s ease-in-out 5s 1 normal;';
        contaiterMid.appendChild(leftAll);
        const left=document.createElement('fieldset');
        left.className='left';
        left.style='background-color: #48aaf9;border-radius:20px;border:1px #48aaf9 solid ;width:400px;height:260px;'
        leftAll.appendChild(left);
        const titleText=document.createElement('legend');
        titleText.style='text-align:center;';
        left.appendChild(titleText);
        const borderTitle=document.createElement('div');
        borderTitle.innerText='Bảng xếp loại  ';
        borderTitle.style='background-color:#2d8ece;border-radius:25px;width:250px;height:45px;font-size:35px;color:white;'
        titleText.appendChild(borderTitle);
        const content=document.createElement('div');
        content.innerHTML+='<p>-Từ 90 đến 100:loại xuất sắc <br> -Từ 80 đến dưới 90 :loại giỏi <br> -Từ 70 đến dưới 80 :loại khá <br> -Từ 60 đến dưới 70:loại trung bình khá <br> -Từ 50 đến dưới 60:loại trung bình <br>-Từ 30 dến dưới 50:loại yếu <br>-Từ dưới 30:loại kém  </p>';
        content.style='font-size:25px;margin-top:-20px;'
        left.appendChild(content);
        clearTimeout(myTime);
    };
    left_mid();
    function right_mid(){
        const right=document.createElement('fieldset');
        right.style='background-color: white;border-radius:20px;border:1px white solid ;width:400px;height:260px;';
        contaiterMid.appendChild(right);
        const titleText=document.createElement('legend');
        titleText.style='text-align:center;';
        right.appendChild(titleText);
        const borderTitle=document.createElement('div');
        borderTitle.innerText='Lợi ích   ';
        borderTitle.style='background-color: #75c4ff;border-radius:25px;width:250px;height:45px;font-size:35px;color:#2d8ece;'
        titleText.appendChild(borderTitle);
        const content=document.createElement('div');
        content.innerHTML+='<p>Website được xây dựng chấm điểm dựa trên phần word chấm điểm trên giấy ban đầu, nhauwng các thao trác quản lý và lưu trữ sẽ thực hiện một cách nhanh hơn ,có độ chính xác cao.</p>';
        content.style='font-size:25px;margin-top:10px;'
        right.appendChild(content);
    };
    right_mid();
};
contaiter_mid();
//content-bottom
const contaiterBot=document.createElement('div');
contaiterBot.style='display:flex;justify-content:space-evenly;align-items:center;margin-top:80px';
contaiter.appendChild(contaiterBot);
function contaiter_bot(){
    const myTime = setTimeout(left_bot, 2000);
    function left_bot(){
        const leftAll=document.createElement('div');
        leftAll.style.animation='left_top 10s ease-in-out 5s 1 normal;';
        contaiterBot.appendChild(leftAll);
        const left=document.createElement('fieldset');
        left.className='left';
        left.style='background-color: #48aaf9;border-radius:20px;border:1px #48aaf9 solid ;width:400px;height:260px;'
        leftAll.appendChild(left);
        const titleText=document.createElement('legend');
        titleText.style='text-align:center;';
        left.appendChild(titleText);
        const borderTitle=document.createElement('div');
        borderTitle.innerText='Mục đích   ';
        borderTitle.style='background-color:#2d8ece;border-radius:25px;width:250px;height:45px;font-size:35px;color:white;'
        titleText.appendChild(borderTitle);
        const content=document.createElement('div');
        content.innerHTML+='<p>Góp phần thực hiện mục tiêu giáo dục là đào tạo con người ,phát triển toàn diện có đạo đức ,trí thức ,sức khỏe thẩm mỹ và nghề nghiệp chung thành với lý tưởng độc lập dân tộc và chủ nghĩa xã hội .Đưa ra định hướng ,nội dung rèn luyện cụ thể phù hợp .</p>';
        content.style='font-size:25px;margin-top:-20px;'
        left.appendChild(content);
        clearTimeout(myTime);
    };
    left_bot();
    function right_bot(){
        const right=document.createElement('fieldset');
        right.style='background-color: white;border-radius:20px;border:1px white solid ;width:400px;height:260px;';
        contaiterBot.appendChild(right);
        const titleText=document.createElement('legend');
        titleText.style='text-align:center;';
        right.appendChild(titleText);
        const borderTitle=document.createElement('div');
        borderTitle.innerText='Yêu cầu   ';
        borderTitle.style='background-color: #75c4ff;border-radius:25px;width:250px;height:45px;font-size:35px;color:#2d8ece;'
        titleText.appendChild(borderTitle);
        const content=document.createElement('div');
        content.innerHTML+='<p>Việc đánh giá kết quả rèn luyện của sinh viên là việc làm thường xuyên trong trường .Quá trình đánh giá phải đảm bảo chính xác ,công bằng ,công khai ,dân chủ.</p>';
        content.style='font-size:25px;margin-top:10px;'
        right.appendChild(content);
    };
    right_bot();
};
contaiter_bot();