
window.addEventListener("DOMContentLoaded", () => {
    

    const player = Plyr.setup("#player", { 
        clickToPlay: false,
        controls: [
            // 'play-large', // The large play button in the center
            // 'play', // Play/pause playback
            'progress', // The progress bar and scrubber for playback and buffering
            'mute', // Toggle mute
            'volume', // Volume control
            // 'settings', // Settings menu
            'pip', // Picture-in-picture (currently Safari only)
            'fullscreen' // Toggle fullscreen
        ],
        
    });
    
    const playertwo = Plyr.setup("#playertwo", { 
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
    
    window.player = player;
});

