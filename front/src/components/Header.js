import './Header.css';
import React from 'react';
import AccountCircleIcon from '@mui/icons-material/AccountCircle';
import Login from './Login';
import { useState } from 'react';


function Header() {

      /** Variable de fermeture de la popup */
    const [buttonPopup, setButtonPopup] = useState(false);
    return(
        <div>
            <div className="Header">
                <div className="blank"></div>
                <div className="title">
                    <h1 id="Chop-in">CHOP'IN</h1>
                </div>
                <div className="profile" onClick={() => setButtonPopup(true)}>
                    <div>
                        <a className="icon-profile">
                            <AccountCircleIcon/>
                        </a>
                    </div>
                </div>
            </div>
            <div className="content">
              <Login trigger={buttonPopup} setTrigger={setButtonPopup}/>
            </div>
        </div>


    )
}

export default Header