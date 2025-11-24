import Autoplay from "embla-carousel-autoplay"
import {
    Carousel,
    CarouselContent,
    CarouselItem,
    CarouselNext,
    CarouselPrevious,
} from "@/components/ui/carousel"

export function Caraousel() {
    return (
        <Carousel
            plugins={[
                Autoplay({
                    delay: 2000,
                }),
            ]}
        >
            <CarouselContent>
                <CarouselItem><img src="resources/public/images/img1.jpg" alt="Image" /></CarouselItem>
                <CarouselItem><img src="resources/public/images/img2.jpg" alt="Image" /></CarouselItem>
                <CarouselItem><img src="resources/public/images/img3.jpg" alt="Image" /></CarouselItem>
                <CarouselItem><img src="resources/public/images/img4.jpg" alt="Image" /></CarouselItem>
                <CarouselItem><img src="resources/public/images/img5.jpg" alt="Image" /></CarouselItem>
            </CarouselContent>
            <CarouselPrevious />
            <CarouselNext />
        </Carousel>
    )
}