import React from 'react';
import ReactDOM from 'react-dom';
import "./frontend.scss";

const divsToUpdate = document.querySelectorAll(".paying-attention-update-me");

divsToUpdate.forEach(function(div) {
    //1st argument - React component that we want to display
    //2nd argument - the actual DOM HTML element on the page that you want to render this into
    ReactDOM.render(<Quiz />, div);
    div.classList.remove("paying-attention-update-me");
})

function Quiz() {
    return (
        <div className="paying-attention-frontend">
            Hello from React 
        </div>
    )
}