import './Header.css';
import React from 'react';
import AccountCircleIcon from '@mui/icons-material/AccountCircle';
import Login from './Login';

function Header() {

    return(
        <div className="Header">
            <div className="blank"></div>
            <div className="title">
                <h1 id="Chop-in">CHOP'IN</h1>
            </div>
            <div className="profile">
                <div>
                    <a className="icon-profile">
                        <AccountCircleIcon/>
                    </a>
                </div>

            </div>
        </div>
    )
}

export default Header