<?php
/**
 * ---------------------
 * 
 * RubricGradearView.php
 * First Created By: Nia Heermance
 * 
 * This class creates the main display window for the Rubric Grader, featuring the
 * NavigationBar and the PanelBar.
 * 
 * The function createRubricGradeableView is called from createMainRubricGraderPage
 * of RubricGraderController.php.
 * 
 * ---------------------
 */

# Namespace:
namespace app\views\grading\popup_refactor;


# Includes:
// Our super class
use app\views\AbstractView;


# Main Class:
class RubricGraderView extends AbstractView {

    
    /**
     * Creates the Rubric Grading page visually.
     * This function is called in reateMainRubricGraderPage of RubricGraderController.php.
     * 
     * @param string $gradeable - The current Gradeable.
     * @param string $sort_type - The current way we are sorting students. Used to create the header.
     * @param string $sort_direction -  Either "ASC" or "DESC" for ascending or descending sorting order.
     *     Used to create the header.
     * 
     */
    public function createRubricGradeableView($gradeable, $sort_type, $sort_direction) {
        $this->setMemeberVariables($gradeable);

        print "hiiiiiiii";
        $this->createBreadcrumbHeader($sort_type, $sort_direction);
    }


    /**
     * Sets the corresponding memeber variables based on provided arguments.
     * 
     * @param string $gradeable - The current Gradeable.
     */
    private function setMemberVariables($gradeable) {
        $this->gradeable = $gradeable;

    }

    /**
     * Created breadcrumb navigation header based on current sorting and gradeable id.
     * Navigation should be:
     *     Submitty > COURSE_NAME > GRADEABLE_NAME Grading > Grading Interface $sort_id $sort_direction Order
     */
    private function createBreadcrumbHeader() {
        $gradeableUrl = $this->core->buildCourseUrl(['gradeable', $this->gradeable->getId(),
            'grading', 'details']);
        $this->core->getOutput()->addBreadcrumb("{$this->gradeable->getTitle()} Grading", $gradeableUrl);

        $this->core->getOutput()->addBreadcrumb('Grading Interface ' .
            GradingOrder::getGradingOrderMessage($sort_type, $sort_direction));
    }

}