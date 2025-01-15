<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    private array $sizeClasses = [
        'xs' => 'text-xs px-3 py-2',
        'sm' => 'text-sm px-3 py-2',
        'md' => 'text-base px-5 py-2.5',
        'lg' => 'text-base px-5 py-3',
        'xl' => 'text-base px-6 py-3.5',
    ];

    // private function getVariantClasses(): array
    // {
    //     $bgColor = 'bg-' . $this->color . '-700';
    //     $bgHoverColor = 'hover:bg-' . $this->color . '-800';
    //     $borderColor = 'border-' . $this->color . '-700';
    //     $textColor = 'text-' . $this->color . '-700';

    //     return [
    //         'solid' => "{$bgColor} {$bgHoverColor} text-white",
    //         'pills' => "{$bgColor} {$bgHoverColor} text-white rounded-full",
    //         'outline' => "border {$borderColor} {$textColor} hover:{$bgColor} hover:text-white",
    //     ];
    // }

    private function getVariantClasses(): array
    {
        $bgColor = match ($this->color) {
            'primary' => 'bg-primary-700 hover:bg-primary-800 dark:bg-primary-600 dark:hover:bg-primary-700',
            'secondary' => 'bg-secondary-800 hover:bg-secondary-900 dark:bg-secondary-800 dark:hover:bg-secondary-700',
            default => 'bg-' . $this->color . '-700 hover:bg-' . $this->color . '-800'
        };

        return [
            'solid' => "{$bgColor} text-white",
            'pills' => "{$bgColor} text-white rounded-full",
            'outline' => "border border-{$this->color}-700 text-{$this->color}-700 hover:{$bgColor} hover:text-white",
        ];
    }


    public function __construct(
        public string $type = 'button',
        public string $color = 'primary',
        public string $variant = 'solid',
        public string $size = 'md',
        public string $icon = '',
        public string $iconPosition = 'left',
        public string $label = '',
        public string $href = '',
        public bool $disabled = false,
    ) {}

    public function getSizeClass(): string
    {
        return $this->sizeClasses[$this->size];
    }

    public function getVariantClass(): string
    {
        return $this->getVariantClasses()[$this->variant];
    }

    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
