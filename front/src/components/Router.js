import React from 'react';
import { BrowserRouter, Routes, Route } from "react-router-dom";

import App from "../App";
import Recipe from "./Recipe";

const Router = () => (
  <BrowserRouter>
    <Routes>
      <Route path="/" element={<App/>} />
      <Route path="/recipe/:id" element={<Recipe/>} />
    </Routes>
  </BrowserRouter>
);

export default Router;
