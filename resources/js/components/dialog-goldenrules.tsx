import {
  Dialog,
  DialogContent,
  DialogTrigger,
} from "@/components/ui/dialog-custom"
import { ScrollArea, ScrollBar } from "@/components/ui/scroll-area"

import { Button } from "./ui/button"

const Golden = () => {

return (
    <Dialog>
      <form>
        <DialogTrigger asChild>
         <Button variant="ghost" className="w-full hover:bg-gray-700/10 rounded-none justify-start text-xs text-gray-600">
          Golden Rules
                             </Button>
        </DialogTrigger>
        <DialogContent className="flex justify-center item-center">
          <ScrollArea type="always" className="md:h-[555px] sm:h-[200px] p-1 pt-4">
            <div className="w-fill h-auto overflow-x-auto">
            <img src="/images/goldenrules.webp" loading="lazy"
                        decoding="async"/>
           </div>
            <ScrollBar orientation="vertical" className="w-full" />
          </ScrollArea> 
        </DialogContent>
      </form>
    </Dialog>
  )
}

export default Golden