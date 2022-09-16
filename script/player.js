
export function renderPlayer () {
    
        const player = Plyr.setup(".one", { 
            clickToPlay: false,
            controls: [
                // 'play-large', // The large play button in the center
                // 'play', // Play/pause playback
                'progress', // The progress bar and scrubber for playback and buffering
                'mute', // Toggle mute
                'volume', // Volume control
                // 'settings', // Settings menu
            ],
            
        });
        
        const playertwo = Plyr.setup(".two", { 
            autoplay: true,
            muted: true, 
            volume: 100,
            controls: [
                // 'play-large', // The large play button in the center
                'play', // Play/pause playback
                'progress', // The progress bar and scrubber for playback and buffering
                'mute', // Toggle mute
                'volume', // Volume control
                // 'settings', // Settings menu
                'pip', // Picture-in-picture (currently Safari only)
                'fullscreen' // Toggle fullscreen
            ],
            
        });
        
    //----------------script modal video------------------
        
        let modal = document.querySelectorAll(".modal");
        let btn = document.querySelectorAll(".openModal");
        
        function hideModal(id) {
            
            document.getElementById('modal'+id).style.display = "none";
            
        }
        
        window.player = player;
         
        for (let i = 0 ; i <= modal.length ; i++) {
        
            btn[i].addEventListener("click", () => {
                
                modal[i].style.display = "block";
                playertwo[i].increaseVolume(10);
                playertwo[i].play();
            });
    
            
            window.onclick = function(event) {
                
                let id = event.target.getAttribute('data-id');
                if (id) {
                    hideModal(id);
                    
                    if (!playertwo[id].paused)
                    playertwo[id].pause();
                    
                } 
                
            };
        
        }
}