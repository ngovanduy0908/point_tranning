const all = document.createElement('div');
document.body.appendChild(all);
function footer_login() {
    const footer = document.createElement('div')
    footer.style = 'background-image:url(https://png.pngtree.com/thumb_back/fw800/background/20190925/pngtree-blue-colour-background-image_314361.jpg);' +
        'background-size:100%;width:100%;height:275px;' +
        'margin-top:2%;padding:10px 4px;display:flex;' +
        'justify-content:space-around;align-items:center; position: fixed; bottom: 0;'
        ;
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