import {
  Dialog,
  DialogContent,
  DialogTrigger,
} from "@/components/ui/dialog-custom"
import { ScrollArea, ScrollBar } from "@/components/ui/scroll-area"

const Golden = () => {

return (
    <Dialog>
      <form>
        <DialogTrigger asChild>
         <img src="/images/goldenrules.webp"/>
        </DialogTrigger>
        <DialogContent className="flex justify-center item-center">
          <ScrollArea type="always" className="md:h-[555px] sm:h-[200px] p-1 pt-4">
            <div className="w-fill h-auto overflow-x-auto">
            <img src="/images/goldenrules.webp"/>
           </div>
            <ScrollBar orientation="vertical" className="w-full" />
          </ScrollArea> 
        </DialogContent>
      </form>
    </Dialog>
  )
}

export default Golden