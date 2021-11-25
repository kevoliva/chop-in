import React, {useState} from 'react'
import './Login.css'

import CloseIcon from '@mui/icons-material/Close';


function Login(props) {

    /** Variables permettant de gérer l'affichage des formulaires */
    var [SignupBtn, setSignupBtn] = useState("sign-up");
    var [SigninBtn, setSigninBtn] = useState("sign-in-hide");
    var [Signup, setSignup] = useState("div-sign-up-show");
    var [Signin, setSignin] = useState("div-sign-in-hide");

    const showSignup = () => { 
        if(SignupBtn !== "sign-up")
        {
            SignupBtn = setSignupBtn("sign-up");
            SigninBtn = setSigninBtn("sign-in-hide");
            Signup = setSignup("div-sign-up-show");
            Signin = setSignin("div-sign-in-hide");
        }
     };

    const showSignin = () => { 
        if(SigninBtn === "sign-in-hide")
        {
            SignupBtn = setSignupBtn("sign-up-hide");
            SigninBtn = setSigninBtn("sign-in");
            Signup = setSignup("div-sign-up-hide");
            Signin = setSignin("div-sign-in-show");   
        }
    };

    /** Pop-up affichée avec les formulaires d'inscription et de connexion */
    return (props.trigger) ? (
        
        <div className="Pop-up">
            <div className="pop-up-header">
                <div className="login-process">
                    <div className={SignupBtn} onClick={showSignup}>S'inscrire</div>
                    <div className={SigninBtn} onClick={showSignin}>Se connecter</div>
                </div>
                <div className="close-btn" onClick ={() => props.setTrigger(false)}><CloseIcon/></div>
            </div>
           <div className="pop-up-content">
               {props.children}
                <div className={Signup}>
                    <div className="div-form-signup">
                        <form className="form">
                            <div className="form-inputs">
                                <input className="input" type="text" placeholder="Nom"/>
                                <input className="input" type="text" placeholder="Prenom"/>
                                <input className="input" type="email" placeholder="Email"/>
                                <input className="input" type="password" placeholder="Mot de Passe"/>
                                <input className="input-btn" type="submit" value="S'inscrire"/>
                            </div>
                        </form>
                    </div>
                </div>
                <div className={Signin}>
                    <div className="div-form-signin">
                        <form className="form">
                            <div className="form-inputs">
                                <input className="input" type="email" placeholder="Email"/>
                                <input className="input" type="password" placeholder="Mot de Passe"/>
                                <input className="input-btn" type="submit" value="Se connecter"/>
                            </div>
                        </form>
                    </div>
                </div>
           </div>
        </div>
    ) : "";
}

export default Login
