import React from 'react'

function Login(props) {
    return (props.trigger) ? (
        <div className="Pop-up">
           <div className="popup-content">
               <button className="close-btn">Close</button>
               {props.children}
           </div>
        </div>
    ) : "";
}

export default Login
