const all = document.createElement('div');
all.id = 'all';
//phần đầu của phần đăng nhập 
function top_login() {
    const top_img = document.createElement('div');
    top_img.id = 'top_img';
    top_img.style = 'background-image: url(https://bophanmotcua.humg.edu.vn/Images/Humg3.jpg);background-repeat:no-repeat;' +
        'width:100%;height:160px;background-size:100% 135px;margin-top:-10px;';
    all.appendChild(top_img);
    //phần menu
    const top_menu = document.createElement('div');
    top_menu.id = 'top_menu';
    top_menu.style = 'margin-top:-41px;margin-left:px;background-color:#2d8ece;width:100%;' +
        'height:30px;text-align:center;border-radius:5px;text-align:center;';
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
        const nav_a1 = document.createElement('a');
        nav_a1.id = 'link1';
        nav_a1.href = 'http://127.0.0.1:5500/codeSub/code-test/test.html';
        nav_a1.style = 'text-decoration:none ;font-size:25px;color:white;' +
            'font-family:"Teko", sans-serif;';
        nav_a1.innerText = 'Trang chủ ';
        nav_li1.appendChild(nav_a1);
        const nav_a2 = document.createElement('a');
        nav_a2.id = 'link2';
        nav_a2.href = './notification.js';
        nav_a2.style = 'text-decoration:none ;font-size:25px;color:white;' +
            'font-family:"Teko", sans-serif;';
        nav_a2.innerText = 'Giới thiệu  ';
        nav_li2.appendChild(nav_a2);
        const nav_a3 = document.createElement('a');
        nav_a3.id = 'link3';
        nav_a3.style = 'text-decoration:none ;font-size:25px;color:white;' +
            'font-family:"Teko", sans-serif;';
        nav_a3.innerText = 'Trang web Đào tạo ';
        nav_li3.appendChild(nav_a3);
        const nav_a4 = document.createElement('a');
        nav_a4.id = 'link4';
        nav_a4.style = 'text-decoration:none ;font-size:25px;color:white;' +
            'font-family:"Teko", sans-serif;';
        nav_a4.innerText = 'Trang web CNTT';
        nav_li4.appendChild(nav_a4);
        const nav_a5 = document.createElement('a');
        nav_a5.id = 'link5';
        nav_a5.style = 'text-decoration:none ;font-size:25px;color:white;' +
            'font-family:"Teko", sans-serif;';
        nav_a5.innerText = 'Trang web HUMG ';
        nav_li5.appendChild(nav_a5);
        //sau khi di chuyển chuột hoặc nhấp chuột vào phần menu 
        function hover_nav_a() {
            nav_a1.addEventListener("mouseover", function () {
                document.querySelector('#link1').style = 'color:black;background: linear-gradient( 35deg, #ccffff,#ffcccc);text-decoration:none ;font-size:25px;' +
                    'border-radius:15px;padding-left:30px;padding-right:30px;padding-bottom:3px;';
            });
            nav_a1.addEventListener("mouseout", function () {
                document.querySelector('#link1').style = 'text-decoration:none ;font-size:25px;color:white;';
            });
            nav_a2.addEventListener("mouseover", function () {
                document.querySelector('#link2').style = 'color:black;background: linear-gradient( 35deg, #ccffff,#ffcccc);text-decoration:none ;font-size:25px;' +
                    'border-radius:15px;padding-left:30px;padding-right:30px;padding-bottom:3px;';
            });
            nav_a2.addEventListener("mouseout", function () {
                document.querySelector('#link2').style = 'text-decoration:none ;font-size:25px;color:white;';
            });
            nav_a2.addEventListener("click", function () {
                const notification2 = confirm('bn có muốn chuyển sang trang giới thiệu ko');
                if (notification2 == true) {
                    window.open('./notification.js', '_self')
                } else {
                    window.open('http://127.0.0.1:5500/codeSub/code-test/test.html', '_self')
                }
            });
            nav_a3.addEventListener("mouseover", function () {
                document.querySelector('#link3').style = 'color:black;background: linear-gradient( 35deg, #ccffff,#ffcccc);text-decoration:none ;font-size:25px;' +
                    'border-radius:15px;padding-left:30px;padding-right:30px;padding-bottom:3px;';
            });
            nav_a3.addEventListener("mouseout", function () {
                document.querySelector('#link3').style = 'text-decoration:none ;font-size:25px;color:white;';
            });
            nav_a3.addEventListener("click", function () {
                const notification3 = confirm('bn có muốn chuyển sang trang Website Đào tạo ko');
                if (notification3 == true) {
                    window.open('https://daotao.humg.edu.vn', '_self')
                } else {
                    window.open('http://127.0.0.1:5500/codeSub/code-test/test.html', '_self')
                }
            });
            nav_a4.addEventListener("mouseover", function () {
                document.querySelector('#link4').style = 'color:black;background: linear-gradient( 35deg, #ccffff,#ffcccc);text-decoration:none ;font-size:25px;' +
                    'border-radius:15px;padding-left:30px;padding-right:30px;padding-bottom:3px;';
            });
            nav_a4.addEventListener("mouseout", function () {
                document.querySelector('#link4').style = 'text-decoration:none ;font-size:25px;color:white;';
            });
            nav_a4.addEventListener("click", function () {
                const notification4 = confirm('bn có muốn chuyển sang trang Website Đào tạo ko');
                if (notification4 == true) {
                    window.open('https://it.humg.edu.vn', '_self')
                } else {
                    window.open('http://127.0.0.1:5500/codeSub/code-test/test.html', '_self')
                }
            });
            nav_a5.addEventListener("mouseover", function () {
                document.querySelector('#link5').style = 'color:black;background: linear-gradient( 35deg, #ccffff,#ffcccc);text-decoration:none ;font-size:25px;' +
                    'border-radius:15px;padding-left:30px;padding-right:30px;padding-bottom:3px;';
            });
            nav_a5.addEventListener("mouseout", function () {
                document.querySelector('#link5').style = 'text-decoration:none ;font-size:25px;color:white;';
            });
            nav_a5.addEventListener("click", function () {
                const notification5 = confirm('bn có muốn chuyển sang trang Website Đào tạo ko');
                if (notification5 == true) {
                    window.open('https://humg.edu.vn', '_self')
                } else {
                    window.open('http://127.0.0.1:5500/codeSub/code-test/test.html', '_self')
                }
            });
        }
        hover_nav_a();
    }
    menu();
}
top_login();
//phần đăng nhập 
function content_login() {
    const contentTable = document.createElement('div');
    contentTable.id = 'table_login';
    contentTable.style = 'border:2px #c8e7fa solid;border-radius:20px;width:33.3%;height:350px;' +
        'margin-left:33.3%;margin-top:5%;box-shadow: 8px 8px 8px #79cff3;background-color:#c8e7fa;';
    all.appendChild(contentTable);
    const tableChild = document.createElement('div');
    tableChild.id = 'tableChild';
    tableChild.style = 'border:2px white solid;border-radius:20px;width:92.5%;height:320px;' +
        'margin-left:3.5%;margin-top:15px;;background-color:white;';
    contentTable.appendChild(tableChild)
    const title_h2 = document.createElement('h2')
    title_h2.id = 'title_login';
    title_h2.title = 'login';
    title_h2.style = 'text-align:center;font-size:35px;margin-top:-5px;color:#454d9f;';
    title_h2.innerText = 'Đăng nhập';
    tableChild.appendChild(title_h2);
    //phần nhập
    const panelBody = document.createElement('div');
    panelBody.className = 'panel-body';
    panelBody.id = 'panel-body';
    tableChild.appendChild(panelBody);
    const form_login = document.createElement('form');
    form_login.method = 'post';
    form_login.id = 'form';
    panelBody.appendChild(form_login);
    //phần nhập tài khoản 
    function account() {
        const account = document.createElement('div');
        account.id = 'form-group';
        account.className = 'form-group';
        form_login.appendChild(account);
        const tk = document.createElement('label');
        tk.for = 'tk';
        tk.style = 'font-size:1.5rem';
        tk.innerText = 'Tài Khoản :';
        account.appendChild(tk);
        const inputText = document.createElement('input');
        inputText.required = 'true';
        inputText.type = 'text';
        inputText.className = 'form-control';
        inputText.id = 'tk';
        inputText.name = 'tk';
        inputText.style = 'width:250px;height:20px;border:none;' +
            'border-bottom:1px black solid;outline:none';
        account.appendChild(inputText);
    }
    account();
    //phần mặt khẩu 
    function password() {
        const password = document.createElement('div');
        password.id = 'form-group';
        password.className = 'form-group';
        password.style = 'margin-top:2.5rem';
        form_login.appendChild(password);
        const pwd = document.createElement('label');
        pwd.for = 'pwd';
        pwd.style = 'font-size:1.5rem';
        pwd.innerText = 'Mật Khẩu :';
        password.appendChild(pwd);
        const inputPass = document.createElement('input');
        inputPass.required = 'true';
        inputPass.type = 'password';
        inputPass.className = 'form-control form-password';
        inputPass.id = 'pwd';
        inputPass.name = 'password';
        inputPass.minlength = '6';
        inputPass.style = 'width:260px;height:20px;border:none;' +
            'border-bottom:1px black solid;outline:none';
        password.appendChild(inputPass);
        //phần icon
        const icon_element = document.createElement('div');
        icon_element.className = 'icon-element';
        icon_element.id = 'icon-element';
        password.appendChild(icon_element);
        const icon1 = document.createElement('i');
        icon1.className = 'fas fa-eye see';
        password.appendChild(icon1);
        const icon2 = document.createElement('i');
        icon2.className = 'fas fa-eye-slash no-see';
        icon2.style = 'display:none';
        password.appendChild(icon2);
    }
    password();
    const space_pass = document.createElement('br');
    form_login.appendChild(space_pass);
    const forgetPassword = document.createElement('a');
    forgetPassword.href = 'forgetPassword.php';
    forgetPassword.id = 'forgetPassword';
    forgetPassword.style = 'color: blue; font-size: 18px;';
    forgetPassword.innerText = 'Quên mật khẩu';
    form_login.appendChild(forgetPassword);
    form_login.addEventListener('mouseover', function () {
        document.querySelector('#forgetPassword').style = 'color:red;font-size:18px;';
    });
    form_login.addEventListener('mouseout', function () {
        document.querySelector('#forgetPassword').style = 'color: blue; font-size: 18px;';
    });
    const space_pass2 = document.createElement('br');
    form_login.appendChild(space_pass2);
    const button = document.createElement('button');
    button.className = 'btn btn-success';
    button.id = 'btn-login';
    button.style = 'margin-left:32%;margin-top:1.5rem;width:150px;height:30px;' +
        'border-radius:25px;box-shadow:5px 5px 5px grey;font-size:20px;';
    button.innerText = 'Đăng nhập ';
    form_login.appendChild(button);
    form_login.addEventListener('mouseover', function () {
        document.querySelector('#btn-login').style = 'margin-left:32%;margin-top:1.5rem;width:150px;height:30px;' +
            'border-radius:25px;box-shadow:5px 5px 5px #79cff3;' +
            'font-size:20px;background:#c8e7fa;border:1px #c8e7fa solid;color:#454d9f';
    });
    form_login.addEventListener('mouseout', function () {
        document.querySelector('#btn-login').style = 'margin-left:32%;margin-top:1.5rem;width:150px;height:30px;' +
            'border-radius:25px;box-shadow:5px 5px 5px grey;font-size:20px;';
    });
}
content_login();
//phần chân trang 
function footer_login() {
    const footer = document.createElement('div')
    footer.style = 'background-image:url(https://png.pngtree.com/thumb_back/fw800/background/20190925/pngtree-blue-colour-background-image_314361.jpg);' +
        'background-size:100%;width:100%;height:275px;' +
        'margin-top:8%;padding:10px 4px;display:flex;' +
        'justify-content:space-around;align-items:center';
    all.appendChild(footer);

    function footer_left() {
        const footer_left = document.createElement('div');
        footer_left.id = 'footer_left';
        footer_left.className = 'footer_left'
        footer_left.style = 'float:left;'
        footer.appendChild(footer_left);
        const footerTitle1 = document.createElement('h2');
        footerTitle1.style = 'text-align:center;color:white;';
        footerTitle1.innerText = 'Bản đồ chỉ dẫn ';
        footer_left.appendChild(footerTitle1);
        const footerTitleSub = document.createElement('h3');
        footerTitleSub.style = 'text-align:center;color:white;';
        footerTitleSub.innerText = 'Trường Đại học Mỏ-Đại chất ';
        footer_left.appendChild(footerTitleSub);
        const map_DH = document.createElement('iframe');
        map_DH.src = 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.0174616877957!2d105.77172461493335!3d21.07196478597495!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134552defbed8e9%3A0x1584f79c805eb017!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBN4buPIC0gxJDhu4thIGNo4bqldA!5e0!3m2!1svi!2s!4v1648170379553!5m2!1svi!2s';
        map_DH.style = 'width:305px;height:180px;border:0;border-radius:15px;';
        map_DH.loading = 'lazy';
        map_DH.referrerpolicy = 'no-referrer-when-downgrade';
        footer_left.appendChild(map_DH);
    }
    footer_left();

    function footer_right() {
        const footer_right = document.createElement('div');
        footer_right.id = 'footer_right';
        footer_right.className = 'footer_right'
        footer_right.style = 'float:right;'
        footer.appendChild(footer_right);

        function footer_top() {
            const footer_top = document.createElement('div');
            footer_right.appendChild(footer_top);
            const footerTitle3 = document.createElement('h2');
            footerTitle3.style = 'text-align:center;color:white;';
            footerTitle3.innerText = 'Mạng xã hội  ';
            footer_top.appendChild(footerTitle3);
            const footerUl = document.createElement('ul');
            footerUl.style = 'list-style:none;display:flex;justify-content:space-evenly;align-items:center;';
            footer_top.appendChild(footerUl);
            const footerLi1 = document.createElement('li');
            footerUl.appendChild(footerLi1);
            const footerLi2 = document.createElement('li');
            footerUl.appendChild(footerLi2);
            const footerLi3 = document.createElement('li');
            footerUl.appendChild(footerLi3);
            const footerLi4 = document.createElement('li');
            footerUl.appendChild(footerLi4);
            const footerLink1=document.createElement('a');
            footerLink1.id='footerLink1';
            footerLink1.href='https://www.facebook.com/humg.edu';
            footerLink1.style='text-decoration:none';
            footerLi1.appendChild(footerLink1);
            const footerLink2=document.createElement('a');
            footerLink2.id='footerLink2';
            footerLink2.href='https://twitter.com/humg_edu_vn';
            footerLink2.style='text-decoration:none';
            footerLi2.appendChild(footerLink2);
            const footerLink3=document.createElement('a');
            footerLink3.id='footerLink3';
            footerLink3.href='https://modiachat.business.site/?m=true';
            footerLink3.style='text-decoration:none';
            footerLi3.appendChild(footerLink3);
            const footerLink4=document.createElement('a');
            footerLink4.id='footerLink4';
            footerLink4.href='https://www.youtube.com/channel/UCxBPI_5zwm5f1rm0HO1zYUQ';
            footerLink4.style='text-decoration:none';
            footerLi4.appendChild(footerLink4);
            const footerImg1=document.createElement('img');
            footerImg1.src='https://humg.edu.vn/content/quangcao/mxh/fa.png';
            footerImg1.style='';
            footerLink1.appendChild(footerImg1);
            const footerImg2=document.createElement('img');
            footerImg2.src='https://humg.edu.vn/content/quangcao/mxh/tw.png';
            footerImg2.style='';
            footerLink2.appendChild(footerImg2);
            const footerImg3=document.createElement('img');
            footerImg3.src='https://humg.edu.vn/content/quangcao/mxh/go.png';
            footerImg3.style='';
            footerLink3.appendChild(footerImg3);
            const footerImg4=document.createElement('img');
            footerImg4.src='https://humg.edu.vn/content/quangcao/mxh/yo.png';
            footerImg4.style='';
            footerLink4.appendChild(footerImg4);
        }
        footer_top();
        const hr = document.createElement('hr');
        hr.style = 'width:600px';
        footer_right.appendChild(hr);

        function footer_bottom() {
            const footer_bottom = document.createElement('div');
            footer_right.appendChild(footer_bottom);
            const footerTitle2 = document.createElement('h2');
            footerTitle2.style = 'text-align:center;color:white;';
            footerTitle2.innerText = 'Liên hệ  ';
            footer_bottom.appendChild(footerTitle2);
            const titleSub1=document.createElement('h4');
            titleSub1.style='color:white';
            titleSub1.innerText='Địa chỉ :Số 18 Phố Viên - Phường Đức Thắng - Q. Bắc Từ Liêm - Hà Nội'
            footer_bottom.appendChild(titleSub1);
            const titleSub2=document.createElement('h4');
            titleSub2.style='color:white';
            titleSub2.innerText='Email:hanhchinhtonghop@humg.edu.vn'
            footer_bottom.appendChild(titleSub2);
            const titleSub3=document.createElement('h4');
            titleSub3.style='color:white';
            titleSub3.innerText='Điện thoại: (+84-24) 3838 9633'
            footer_bottom.appendChild(titleSub3);
        }
        footer_bottom()
    }
    footer_right();
}
footer_login();
document.body.appendChild(all);
