
import { Button } from "@/components/ui/button"
import * as React from "react"
import {
  Accordion,
  AccordionContent,
  AccordionItem,
  AccordionTrigger,
} from "@/components/ui/accordion-custom"

import Golden from "./dialog-goldenrules"
import K3LH from "./dialog-k3lh"

const Bar = () => {
    const [isOpen, setIsOpen] = React.useState(false)

    return (


        <Accordion
      type="single"
      collapsible
      className="w-full"
      defaultValue=""
    >
      <AccordionItem value="item-1">

          <AccordionTrigger className="px-3 h-4 rounded-t-md text-black font-bold">K3LH dan Golden Rules</AccordionTrigger>
        
        <AccordionContent className="flex flex-col">
                <div className="h-fit overflow-hidden">
                    <K3LH></K3LH>
                </div>
                <div className="h-fit overflow-hidden">
                    <Golden></Golden>
                </div>   
        </AccordionContent>
      </AccordionItem>
    </Accordion>
    )
}

export default Bar