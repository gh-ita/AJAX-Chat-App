async function callScript() {
    try {
        const response = await fetch("../model/scriptAjout.php", {
            method: 'POST',
            body: new FormData(document.getElementById('formulaire'))
        });

        if (response.ok) {
            console.log("Ajout script ok");

            const messageResponse = await fetch("../model/scriptSelection.php", {
                method: 'POST'
            });

            if (messageResponse.ok) {
                const message = await messageResponse.text(); 
                const resultDiv = document.getElementById('chatArea');
                const [user, messageContent] = message.split('||');
                const newUserSpan = document.createElement('span');
                newUserSpan.textContent = user;
                const newMessageSpan = document.createElement('span');
                newMessageSpan.textContent = messageContent;
                resultDiv.appendChild(newUserSpan);
                resultDiv.appendChild(document.createElement('br'));
                resultDiv.appendChild(newMessageSpan);
                resultDiv.appendChild(document.createElement('hr'));
            } else {
                console.log('Message response not ok');
            }
        } else {
            console.log("Error in Ajout script call");
        }
    } catch (error) {
        console.log(error);
    }
}

document.getElementById("formulaire").addEventListener('submit',function(event){
    event.preventDefault();
    callScript();
});
