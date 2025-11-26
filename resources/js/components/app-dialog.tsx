
import { Button } from "@/components/ui/button"
import * as React from "react"
import { ChevronsUpDown } from "lucide-react"
import {
    Collapsible,
    CollapsibleContent,
    CollapsibleTrigger,
} from "@/components/ui/collapsible"
import { Label } from "@/components/ui/label"

import Golden from "./dialog-goldenrules"
import K3LH from "./dialog-k3lh"

const Bar = () => {
    const [isOpen, setIsOpen] = React.useState(false)

    return (
        <Collapsible
            open={isOpen}
            onOpenChange={setIsOpen}
            className="flex w-fill h-fill flex-col">
            <div className="flex items-center justify-between">
               
                <CollapsibleTrigger asChild>
                    <Button variant="default" className="w-full h-full items-center justify-center bg-yellow-400 rounded-md hover:black/90">
                    
                    <h4 className="text-sm font-semibold mx-auto">
                    K3LH dan Golden Rules
                    </h4>
                        <span className="sr-only">Toggle</span>
                    </Button>
                </CollapsibleTrigger>
            </div>
            <CollapsibleContent className="w-fill grid grid-cols-2 gap-1 p-1">

                <div className="h-28 overflow-hidden">
                    <h2 className="p-1 bg-white/50 text-sm font-semibold mx-auto">K3LH</h2>
                    <K3LH></K3LH>
                </div>
                <div className="h-28 overflow-hidden">
                    <h2 className="p-1 bg-white/50 text-sm font-semibold mx-auto">Golden Rules</h2>
                    <Golden></Golden>
                </div>   

                 
                    
                
            </CollapsibleContent>
        </Collapsible>
    )
}

export default Bar