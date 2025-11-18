import React from "react";
import { createRoot } from "react-dom/client";
import App from "./app.jsx";

const rootElement = document.getElementById("react-root");
if (rootElement) {
    createRoot(rootElement).render(<App />);
}
