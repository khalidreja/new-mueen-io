<?php

namespace App\Policies;

use App\Models\LessonPlan;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class LessonPlanPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return $user->teacher !== null;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, LessonPlan $lessonPlan): bool
    {
        return $user->teacher && $user->teacher->id === $lessonPlan->teacher_id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return $user->teacher !== null;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, LessonPlan $lessonPlan): bool
    {
        return $user->teacher && $user->teacher->id === $lessonPlan->teacher_id;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, LessonPlan $lessonPlan): bool
    {
        return $user->teacher && $user->teacher->id === $lessonPlan->teacher_id;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, LessonPlan $lessonPlan): bool
    {
        return $user->teacher && $user->teacher->id === $lessonPlan->teacher_id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, LessonPlan $lessonPlan): bool
    {
        return $user->teacher && $user->teacher->id === $lessonPlan->teacher_id;
    }
}
