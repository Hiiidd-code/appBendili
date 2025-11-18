import React from "react"
import ReactDOM from "react-dom/client"

import { Button } from "@/components/ui/button"

function App() {
  return (
    <div className="p-4">
      <Button>Click Me</Button>
    </div>
  )
}

ReactDOM.createRoot(document.getElementById("react-widget")).render(<App />)
