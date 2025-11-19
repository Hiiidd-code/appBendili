import './bootstrap';
import React from "react";
import { createRoot } from "react-dom/client"
import { Button } from "./components/ui/button";
import { SidebarProvider, Sidebar, SidebarTrigger } from "@/components/ui/sidebar";
import { Switch } from "@/components/ui/switch"; 


function App() {
  return (
    <div>
      WORKING
    </div>
  )
}


const root = createRoot(document.getElementById("app"));
root.render(
  <>
    <App />
    <Sidebar />
  </>
);

 
export default MyPage
