import {renderPlayer} from './player.js'; 

async function displayArticle(id = null) {
        
    const url = new URL ('http://localhost:8080/Zeremy-website/src/apis.php');
    
    if (id !== null)
        url.searchParams.set('id', id);
        
    try {
    
    const response = await fetch(url);
    
    const user = await response.json();
    
    return user;
    
    } catch (error) {
        console.log(error);
    }
}

async function renderArticle ($id = null) {
    
    let articles = await displayArticle($id);
    
    let count = 0;
    
    const element = document.getElementById("ajax");
    
    if (element) {
        element.innerHTML = "";
        
        let newElem = document.createElement('div');
        newElem.setAttribute('class', 'grid containerWeb color text');
        element.appendChild(newElem);
        
            articles.forEach(post => {
                
                let newElems = document.createElement('div');
                newElems.setAttribute('class', 'isotopeItems');
                newElems.innerHTML = `
                    <div class="grid-item openModal">
                        <div class="filter">
                            <div class="plyr__video-embed one">
                                <iframe
                                    src="https://www.youtube.com/embed/${post.link}?loop=true&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
                                    allowfullscreen
                                    allowtransparency
                                    origin: 'http://localhost:8080/Zeremy-website/'
                                ></iframe>
                            </div>
                        </div>
                    </div>
                    <div id="modal${count}" class="modal" name="var" data-id="${count}">
                        <div class="modalContent flex collum">
                            <h2 class="videotitle title white">${post.title}</h2>
                            <div class="playermodal">
                                <div class="plyr__video-embed two" id="player${count}" >
                                    <iframe 
                                        src="https://www.youtube.com/embed/${post.link}?loop=true&amp;byline=false&amp;portrait=false&amp;title=false&amp;speed=true&amp;transparent=0&amp;gesture=media"
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
    }
        return;

}

document.addEventListener("DOMContentLoaded", async function (e) {
    e.preventDefault();
    
    await renderArticle();
    await renderPlayer();
        
});

const select = document.getElementById('select');

if(select) {
    select.addEventListener('click', function (e) {
        e.preventDefault();
            
            select.addEventListener('change', async function () {
            
                let choice = select.selectedIndex;
                let id = select.options[choice].value;
            
                console.log(id);
                
                if (id === "all" ) {
                    
                    await renderArticle();
                    await renderPlayer();
                }
                
                else {
        
                    await renderArticle(id);
                    await renderPlayer();
                }
        
            })
        
    })
}
    
    
    