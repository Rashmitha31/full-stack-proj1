const form = document.querySelector(".typing-area"),
  inputField = form.querySelector(".input-field"),
  sendBtn = form.querySelector("button"),
  chatBox = document.querySelector(".chat-box");

form.onsubmit = (e) => {
  e.preventDefault(); // Preventing form from submitting
};

sendBtn.onclick = () => {
  // Start AJAX
  let xhr = new XMLHttpRequest(); // Creating XMLHttpRequest object
  xhr.open("POST", "php/insert-chat.php", true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        inputField.value = ""; // Clear the input field
        scrollToBottom();
      }
    }
  };

  // We have to send the form data through AJAX to PHP
  let formData = new FormData(form); // Creating new FormData object
  xhr.send(formData); // Sending form data to PHP
};
chatBox.onmouseenter = ()=>{
  chatBox.classList.add("active");
}

chatBox.onmouseleave = ()=>{
  chatBox.classList.remove("active");
}


setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            let data = xhr.response;
            chatBox.innerHTML = data;
            if(!chatBox.classList.contains("active")){
              scrollToBottom();
            }
          }
      }
    }
    //xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //xhr.send("incoming_id="+incoming_id);
    let formData = new FormData(form); // Creating new FormData object
    xhr.send(formData); 
}, 500);

function scrollToBottom(){
  chatBox.scrollTop = chatBox.scrollHeight;
}