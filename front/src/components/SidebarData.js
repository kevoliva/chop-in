import React from 'react'

import HomeIcon from '@mui/icons-material/Home';
import EventIcon from '@mui/icons-material/Event';
import ExploreIcon from '@mui/icons-material/Explore';
import ForumRoundedIcon from '@mui/icons-material/ForumRounded';
import AccountBoxIcon from '@mui/icons-material/AccountBox';


/**
 * Liste des pages de la barre de navigation utilisée dans Navbar.js
 */
export const SidebarData = [
    {
        title: "Home",
        icon: <HomeIcon />,
        link: "/home",

    },
    {
        title: "Events",
        icon: <EventIcon />,
        link: "/events",

    },
    {
        title: "Map",
        icon: <ExploreIcon />,
        link: "/map",

    },
    {
        title: "Chat",
        icon: <ForumRoundedIcon />,
        link: "/chat",
    },
    {
        title: "Profile",
        icon: <AccountBoxIcon />,
        link: "/profile",
    },
];