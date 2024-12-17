import React from "react";
import { GoogleFonts, FW_LIGHT, FW_NORMAL, FW_SEMIBOLD, FW_BOLD } from 'e-ui-react';
import ContextProvider from 'e-ui-react';
import  { AppRouting } from '@Config/Routing.js';
import './index.css';

const fonts =  [{
  "font-family": "Poppins",
  "weight": [FW_NORMAL, FW_SEMIBOLD],
}];

import("react-dom/client").then((ReactDOM)=>{
  ReactDOM.createRoot(document.getElementById("root"))
   .render(
    <ContextProvider variables={{ "test":"Hello" }}>
      <GoogleFonts values={fonts}>
        <AppRouting />
      </GoogleFonts>
   </ContextProvider>);
 });
 
 