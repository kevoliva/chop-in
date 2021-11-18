import React from 'react'
import './Login.css'

import CloseIcon from '@mui/icons-material/Close';

function Login(props) {
    return (props.trigger) ? (
        <div className="Pop-up">
            <div className="pop-up-header">
                <div className="login-process">
                    <div className="sign-up">S'inscrire</div>
                    <div className="sign-in">Se connecter</div>
                </div>
                <div className="close-btn"><CloseIcon/></div>
            </div>
           <div className="pop-up-content">
               {props.children}
               <h1>YAAAAAA</h1>
           </div>
        </div>
    ) : "";
}

export default Login
