import { jarallax, jarallaxVideo } from "https://cdn.jsdelivr.net/npm/jarallax@2/+esm";

let backvideo = document.getElementById('backvideo');
let backvideo2 = document.getElementById('backvideo2');
let backvideo3 = document.getElementById('backvideo3');

backvideo.addEventListener('mouseover', function () {
    
    jarallaxVideo();

    jarallax(document.querySelectorAll('.jarallax'), {
    type: 'scroll',
    speed: 0.4,
    videoSrc: "mp4:./assets/video/zeremy.mp4",
    videoPlayOnlyVisible: "true",
    });

    backvideo.addEventListener('mouseleave', function () {
        jarallax(document.querySelectorAll('.jarallax'), 'destroy');
    });   
})

backvideo2.addEventListener('mouseover', function () {
    
    jarallaxVideo();

    jarallax(document.querySelectorAll('.jarallax2'), {
    type: 'scroll',
    speed: 0.4,
    videoSrc: "mp4:./assets/video/zeremyceycey.mp4",
    videoPlayOnlyVisible: "true",
    });

    backvideo2.addEventListener('mouseleave', function () {
        jarallax(document.querySelectorAll('.jarallax2'), 'destroy');
    });            
})

backvideo3.addEventListener('mouseover', function () {
    
    jarallaxVideo();

    jarallax(document.querySelectorAll('.jarallax3'), {
    type: 'scroll',
    speed: 0.4,
    videoSrc: "mp4:./assets/video/zeremymusic.mp4",
    videoPlayOnlyVisible: "true", 
    });

    backvideo3.addEventListener('mouseleave', function () {
        jarallax(document.querySelectorAll('.jarallax3'), 'destroy');
    });            
})


