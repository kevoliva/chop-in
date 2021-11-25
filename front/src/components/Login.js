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
                    <h1>S'inscrire</h1>
                    <div>
                        <form>
                            <input type="text" placeholder="Nom"/>
                            <input type="text" placeholder="Prenom"/>
                            <input type="email" placeholder="Email"/>
                            <input type="password" placeholder="Mot de Passe"/>
                            <input type="submit" value="S'inscrire"/>
                        </form>
                    </div>
                </div>
                <div className={Signin}>
                    <h1>Se connecter</h1>
                    <div>
                        <form>
                        <input type="email" placeholder="Email"/>
                            <input type="password" placeholder="Mot de Passe"/>
                            <input type="submit" value="Se connecter"/>
                        </form>
                    </div>
                </div>
           </div>
        </div>
    ) : "";
}

export default Login
