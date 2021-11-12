
import './Navbar.css';
import React,  { useState } from 'react';
import { SidebarData } from './SidebarData';


import MenuRoundedIcon from '@mui/icons-material/MenuRounded';


/**
 * Barre de navigation générée via SidebarData.js
 */
function Navbar() {

    /**
     * Déclaration des variables
     */
    var [MenuBurger, menuStyle] = useState("menu-burger-clicked");
    var [RowTitle, titleStyle] = useState("title-navbar-row-hide");
    var [RowBurger, iconStyle] = useState("menu-burger-row-hide");
    var [Navbar, navbarStyle] = useState("Navbar-hide");
   
    /**
     * Fonction appelée lors du click sur le menu burger 
     */
    const changeStyle = () => {
        if(MenuBurger == "menu-burger-clicked")
        {
            MenuBurger = menuStyle("menu-burger");
            RowTitle = titleStyle("title-navbar-row");
            RowBurger = iconStyle("menu-burger-row");
            Navbar = navbarStyle("Navbar");
        }
        else
        {
            MenuBurger = menuStyle("menu-burger-clicked");
            RowTitle = titleStyle("title-navbar-row-hide");
            RowBurger = iconStyle("menu-burger-row-hide");
            Navbar = navbarStyle("Navbar-hide");
        }
    };

    /**
     * Vue affichée
     */
    return (
        <div className={Navbar}>
            <ul className="NavbarList">
            <div className={MenuBurger} onClick={changeStyle}>
                <li className={RowBurger}><MenuRoundedIcon/></li>
            </div>
                {SidebarData.map((val, key) => {
                    return (
                        <li key={key}
                            className="row"
                            id={window.location.pathname == val.link ? "active" : ""}
                            onClick={() => {
                                window.location.pathname = val.link
                            }}>
                            <div id="icon-navbar-row">{val.icon}</div>
                            <div id={RowTitle}>{val.title}</div>
                        </li>
                    );
                })}
            </ul>
        </div>
    )
}

export default Navbar