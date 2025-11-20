import { Search } from "lucide-react"

import { Label } from "@/components/ui/label"
import {
  SidebarGroup,
  SidebarGroupContent,
  SidebarInput,
} from "@/components/ui/sidebar"

export function SearchForm({ ...props }: React.ComponentProps<"form">) {
  return (
    <form {...props}>
      <SidebarGroup className="tw:py-0">
        <SidebarGroupContent className="tw:relative">
          <Label htmlFor="search" className="tw:sr-only">
            Search
          </Label>
          <SidebarInput
            id="search"
            placeholder="Search the docs..."
            className="tw:pl-8"
          />
          <Search className="tw:pointer-events-none tw:absolute tw:left-2 tw:top-1/2 tw:size-4 tw:-translate-y-1/2 tw:select-none tw:opacity-50" />
        </SidebarGroupContent>
      </SidebarGroup>
    </form>
  )
}
