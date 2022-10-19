import { jarallax, jarallaxVideo } from "https://cdn.jsdelivr.net/npm/jarallax@2/+esm";

let links = document.links;
for (let i = 0, linksLength = links.length ; i < linksLength ; i++) {
  if (links[i].hostname !== window.location.hostname) {
    links[i].target = '_blank';
    links[i].rel = 'noreferrer noopener';
  }
}

//slide effect on channel name and link channel
function sliding (elem) {

    let slidingNewsletter = document.querySelector(elem);

    if(slidingNewsletter) {
        window.addEventListener('scroll', () => {

            const {scrollTop, clientHeight} = document.documentElement;

            // console.log(scrollTop, clientHeight);
        
            const topElementToTopViewport = slidingNewsletter.getBoundingClientRect().top;
            
            if(scrollTop > (scrollTop + topElementToTopViewport).toFixed() - clientHeight * 0.8){
                slidingNewsletter.classList.add('active')
            }
        })
    }
}

sliding('.slide');
sliding('.slide2');
sliding('.slide3');

sliding('.slide4');
sliding('.slide5');
sliding('.slide6');

sliding('.slide7');
sliding('.slide8');
sliding('.slide9');

//fade effect on home video
function fadeIn(bloc) {
    const element = bloc.querySelector('div')
        // Initilize the opacity with 0.1
        let initOpacity = 0.1;
        // Update the opacity with 0.1 every 10 milliseconds
        const timer = setInterval(function () {
        if (initOpacity >= 1) {
            clearInterval(timer);
        }
        element.style.opacity = initOpacity;
        element.style.filter = 'alpha(opacity=' + initOpacity * 100 + ")";
        initOpacity += initOpacity * 0.5;
    }, 25);
}
function fadeOut(bloc) {
    const element = bloc.querySelector('div')
        // Initilize the opacity with 0.1
        let initOpacity = 1;
        // Update the opacity with 0.1 every 10 milliseconds
        const timer = setInterval(function () {
        if (initOpacity < 0.000001) {
            clearInterval(timer);
        }
        element.style.opacity = initOpacity;
        element.style.filter = 'alpha(opacity=' + initOpacity * 100 + ")";
        initOpacity -= initOpacity * 0.25;
    }, 25);
}

let backvideo = document.getElementById('backvideo');
let backvideo2 = document.getElementById('backvideo2');
let backvideo3 = document.getElementById('backvideo3');

//start video when mouse is over the channel bloc with fadein and fadeout effect
if (backvideo) {
    backvideo.addEventListener('mouseenter', function () {

        let enter = setTimeout(function () {
            jarallaxVideo();
        
            jarallax(document.querySelector('.jaral'), {
            type: 'scroll',
            speed: 0.4,
            videoSrc: "mp4:./assets/video/zeremy.mp4",
            videoPlayOnlyVisible: "true",
            });

            fadeIn(backvideo.querySelector('div'));
        }, 250)

        backvideo.addEventListener('mouseleave', function () {

            clearTimeout(enter);
            
            setTimeout(function () {

                let jaral = document.querySelector('.jaral');

                if (jaral.querySelectorAll('div').length > 0 ) {
                    fadeOut(backvideo.querySelector('div')); 
                }
                setTimeout(function () {
                    jarallax(document.querySelector('.jaral'), 'destroy');
                }, 500)
            }, 250)
        });   
    })
}
if (backvideo2) {
    backvideo2.addEventListener('mouseenter', function () {

        let enter = setTimeout(function () {
            jarallaxVideo();

            jarallax(document.querySelector('.jaral2'), {
            type: 'scroll',
            speed: 0.4,
            videoSrc: "mp4:./assets/video/zeremyceycey.mp4",
            videoPlayOnlyVisible: "true",
            });

            fadeIn(backvideo2.querySelector('div'));
        }, 250)

        
        backvideo2.addEventListener('mouseleave', function () {

            clearTimeout(enter);

            setTimeout(function () {

                let jaral = document.querySelector('.jaral2');

                if (jaral.querySelectorAll('div').length > 0 ) {
                    fadeOut(backvideo2.querySelector('div')); 
                }

                setTimeout(function () {
                    jarallax(document.querySelector('.jaral2'), 'destroy');
                }, 500)
            }, 250)
        });            
    })
}
if (backvideo3) {
    backvideo3.addEventListener('mouseenter', function () {
        
        let enter = setTimeout(function () {
            jarallaxVideo();

            jarallax(document.querySelector('.jaral3'), {
            type: 'scroll',
            speed: 0.4,
            videoSrc: "mp4:./assets/video/zeremymusic.mp4",
            videoPlayOnlyVisible: "true", 
            });

            fadeIn(backvideo3.querySelector('div'));
        }, 250)

        backvideo3.addEventListener('mouseleave', function () {

            clearTimeout(enter);

            setTimeout(function () {

                let jaral = document.querySelector('.jaral3');

                if (jaral.querySelectorAll('div').length > 0 ) {
                    fadeOut(backvideo3.querySelector('div')); 
                }

                setTimeout(function () {
                    jarallax(document.querySelector('.jaral3'), 'destroy');
                }, 500)
            }, 250)
        });            
    })
}

