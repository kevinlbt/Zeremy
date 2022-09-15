
async function displayArticle() {
        
        const url = new URL ('https://kevinlebot.sites.3wa.io/Zeremy-website/src/apis.php');
        
        try {
        
        const response = await fetch(url);
        
        const user = await response.json();
        
        return user;
        
        } catch (error) {
            console.log(error);
        }
}

async function renderArticle () {
    
    let articles = await displayArticle();
    
    let count = 0;
    
    const element = document.getElementById("ajax");
    
    let newElem = document.createElement('div');
    newElem.setAttribute('class', 'grid containerWeb color text');
    element.appendChild(newElem);
    
        articles.forEach(post => {
            
            let newElems = document.createElement('div');
            newElems.innerHTML = `
                <div class="grid-item openModal">
                    <div class="filter">
                        <div class="plyr__video-embed one">
                            <iframe
                                src="https://www.youtube.com/embed/`+post.link+`?loop=true&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                                allowfullscreen
                                allowtransparency
                            ></iframe>
                        </div>
                    </div>
                </div>
                <div id="modal`+count+`" class="modal" name="var" data-id="`+count+`">
                    <div class="modalContent flex collum">
                        <h2 class="videotitle title white">`+post.title+`</h2>
                        <div class="playermodal">
                            <div class="plyr__video-embed two" id="player`+count+`" >
                                <iframe 
                                    src="https://www.youtube.com/embed/`+post.link+`?loop=true&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                                    allowfullscreen
                                    allowtransparency
                                    allow="autoplay"
                                ></iframe>
                            </div>
                        </div>
                    </div>
                </div>  
                
            `;
        count++
        newElem.appendChild(newElems);
        });
        
        return;

}

//     const Form = document.getElementById('categorySort');
//     const select = document.getElementById('select');
    
//     Form.addEventListener('click', async function (e) {
//         e.preventDefault();
        
//         const postId = select.value === "" ? null : select.value;
        
//         await renderArticle();
// })

    document.addEventListener("DOMContentLoaded", function (e) {
        e.preventDefault();
        
        renderArticle();
        
});