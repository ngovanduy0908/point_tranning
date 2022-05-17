const title=document.createElement('title');
title.innerText="HUMG.DRL.NCKH"
document.head.innerHTML+='<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />'
document.head.innerHTML+=`<link rel="shortcut icon" href="https://dkxt.humg.edu.vn/favicon.ico" type="image/x-icon">`
document.head.appendChild(title)

const all = document.createElement('div');
all.id = 'all';

//phần đầu 
function top_homeTR() {
    const top_img = document.createElement('div');
    top_img.id = 'top_img';
    top_img.style = 'background-image: url(https://bophanmotcua.humg.edu.vn/Images/Humg3.jpg);background-repeat:no-repeat;'
        +'width:100%;height:160px;background-size:100% 135px;margin-top:-10px;';
    all.appendChild(top_img);
    //phần menu
    const top_menu = document.createElement('div');
    top_menu.id = 'top_menu';
    top_menu.style = 'margin-top:-41px;margin-left:px;background-color:#2d8ece;width:100%;' +
        'height:37px;text-align:center;border-radius:5px;text-align:center;';
    all.appendChild(top_menu);

    function menu() {
        const nav_ul = document.createElement('ul');
        nav_ul.id = 'nav_list';
        nav_ul.style = 'list-style:none;display:flex;justify-content:space-around;'
        top_menu.appendChild(nav_ul);
        const nav_li1 = document.createElement('li');
        nav_li1.id = 'items';
        nav_ul.appendChild(nav_li1);
        const nav_li2 = document.createElement('li');
        nav_li2.id = 'items';
        nav_ul.appendChild(nav_li2);
        const nav_li3 = document.createElement('li');
        nav_li3.id = 'items';
        nav_ul.appendChild(nav_li3);
        const nav_li4 = document.createElement('li');
        nav_li4.id = 'items';
        nav_ul.appendChild(nav_li4);
        const nav_li5 = document.createElement('li');
        nav_li5.id = 'items';
        nav_ul.appendChild(nav_li5);
        const nav_li6 = document.createElement('li');
        nav_li6.id = 'items';
        nav_ul.appendChild(nav_li6);
        const nav_a2 = document.createElement('a');
        nav_a2.id = 'link2';
        nav_a2.href = './department/index.php';
        nav_a2.style = 'text-decoration:none ;font-size:25px;color:white;' +
            'font-family:"Teko", sans-serif;';
        nav_a2.innerText = 'Quản lý Khoa   ';
        nav_li2.appendChild(nav_a2);
        const nav_a3 = document.createElement('a');
        nav_a3.id = 'link3';
        nav_a3.style = 'text-decoration:none ;font-size:25px;color:white;' +
            'font-family:"Teko", sans-serif;';
        nav_a3.innerText = 'Quản Lý Khóa Học ';
        nav_li3.appendChild(nav_a3);
        const nav_a4 = document.createElement('a');
        nav_a4.id = 'link4';
        nav_a4.style = 'text-decoration:none ;font-size:25px;color:white;' +
            'font-family:"Teko", sans-serif;';
        nav_a4.innerText = 'Quản Lý Học Kì ';
        nav_li4.appendChild(nav_a4);
        const nav_a5 = document.createElement('a');
        nav_a5.id = 'link5';
        nav_a5.style = 'text-decoration:none ;font-size:25px;color:white;' +
            'font-family:"Teko", sans-serif;';
        nav_a5.innerHTML = '<i class="fas fa-sign-out-alt"></i>Đăng xuất';
        nav_li5.appendChild(nav_a5);
        //sau khi di chuyển chuột hoặc nhấp chuột vào phần menu 
        function hover_nav_a() {
            nav_a2.addEventListener("mouseover", function () {
                document.querySelector('#link2').style = 'color:black;background: linear-gradient( 35deg, #ccffff,#ffcccc);text-decoration:none ;font-size:25px;' +
                    'border-radius:15px;padding-left:30px;padding-right:30px;padding-bottom:-3px;';
            });
            nav_a2.addEventListener("mouseout", function () {
                document.querySelector('#link2').style = 'text-decoration:none ;font-size:25px;color:white;';
            });
            // nav_a2.addEventListener("click", function () {
            //     window.open('./department/index.php', '_self')
            //     const notification2 = confirm('bn có muốn chuyển sang trang này ko');
            //     if (notification2 == true) {
            //         window.open('../admin/humg/department/index.php', '_self')
            //     } else {
            //         window.open('http://127.0.0.1:5500/code-test/test.html', '_self')
            //     }
            // });
            nav_a3.addEventListener("mouseover", function () {
                document.querySelector('#link3').style = 'color:black;background: linear-gradient( 35deg, #ccffff,#ffcccc);text-decoration:none ;font-size:25px;' +
                    'border-radius:15px;padding-left:30px;padding-right:30px;padding-bottom:-3px;';
            });
            nav_a3.addEventListener("mouseout", function () {
                document.querySelector('#link3').style = 'text-decoration:none ;font-size:25px;color:white;';
            });
            nav_a3.addEventListener("click", function () {
                const notification3 = confirm('bn có muốn chuyển sang trang này ko');
                if (notification3 == true) {
                    window.open('./course/index.php', '_self')
                } else {
                    window.open('http://127.0.0.1:5500/code-test/test.html', '_self')
                }
            });
            nav_a4.addEventListener("mouseover", function () {
                document.querySelector('#link4').style = 'color:black;background: linear-gradient( 35deg, #ccffff,#ffcccc);text-decoration:none ;font-size:25px;' +
                    'border-radius:15px;padding-left:30px;padding-right:30px;padding-bottom:-3px;';
            });
            nav_a4.addEventListener("mouseout", function () {
                document.querySelector('#link4').style = 'text-decoration:none ;font-size:25px;color:white;';
            });
            nav_a4.addEventListener("click", function () {
                const notification4 = confirm('bn có muốn chuyển sang trang Website Đào tạo ko');
                if (notification4 == true) {
                    window.open('./system/index.php', '_self')
                } else {
                    window.open('http://127.0.0.1:5500/code-test/test.html', '_self')
                }
            });
            nav_a5.addEventListener("mouseover", function () {
                document.querySelector('#link5').style = 'color:black;background: linear-gradient( 35deg, #ccffff,#ffcccc);text-decoration:none ;font-size:25px;' +
                    'border-radius:15px;padding-left:30px;padding-right:30px;padding-bottom:-3px;';
            });
            nav_a5.addEventListener("mouseout", function () {
                document.querySelector('#link5').style = 'text-decoration:none ;font-size:25px;color:white;';
            });
            nav_a5.addEventListener("click", function () {
                const notification5 = confirm('bn có muốn chuyển sang trang này ko');
                if (notification5 == true) {
                    window.open('../../login/logout.php', '_self')
                } else {
                    window.open('http://127.0.0.1:5500/code-test/test.html', '_self')
                }
            });
           
        }
        hover_nav_a();
    }
    menu();
}
top_homeTR();

document.body.appendChild(all);